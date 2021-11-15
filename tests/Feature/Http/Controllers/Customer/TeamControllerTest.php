<?php

namespace Tests\Feature\Http\Controllers\Customer;

use App\Models\Team;
use App\Models\TeamMember;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamControllerTest extends TestCase
{
   use RefreshDatabase;

   public $user;

   public function test_user_must_login_to_access_team()
   {
       $response = $this->get(route('customer.team.index'));

       $response->assertStatus(302);
   }
   
   private function  createUser()
   {
       User::factory()->create();

       $this->user = User::first();

       return $this->user;
   }

   private function genRandomUser()
   {
    
     $user =  User::factory()->createOne();

    $randomUser =  User::where('id' , $user->id)->first();

    return $randomUser;

   }

   private function  createTeamByUser(User $user)
   {
       $team =  Team::create([
            'name' => 'personal_team',
            'creator_id' => $user->id
        ]);

        $team =  TeamMember::create([
            'team_id' => $team->id,
            'user_id' => $user->id
        ]);
       
       $team = Team::where('id' , $team->id)->first();

       return $team;
   }

   public function test_loggedin_user_can_access_team()
   {
       $user =  $this->createUser();

       $response = $this->actingAs($user)->get(route('customer.team.index'));

       $this->assertDatabaseCount('teams' , 0);

       $response->assertStatus(200);
   }

   public function test_user_can_create_team()
   {
       $user =  $this->createUser();

       $response = $this->actingAs($user)->post(route('customer.team.store'),['name' => 'personal_team']);

       $response->assertRedirect(route('customer.team.index'));

       $this->assertDatabaseCount('teams' , 1);

       $this->assertDatabaseCount('team_members' , 1);

   }
   public function test_user_submit_invalid_team()
   {
       $user =  $this->createUser();

       $response = $this->actingAs($user)->post(route('customer.team.store'));

       $response->assertSessionHasErrors(['name']);

       $this->assertDatabaseCount('teams' , 0);

       $response->assertStatus(302);

       $this->assertDatabaseCount('team_members' , 0);

   }

   public function test_user_can_show_team()
   {
       $teamCreator =  $this->createUser();

       $team =$this->createTeamByUser($teamCreator);

       $response = $this->actingAs($teamCreator)->get(route('customer.team.show' ,['team'=>$team]));

        $response->assertStatus(200);
 
   }

   public function test_user_cannot_show_team_when_not_join()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $teamCreatorResponse = $this->actingAs($teamCreator)->get(route('customer.team.show' , $team));

        $teamCreatorResponse->assertStatus(200);

       $randomUser =  $this->genRandomUser();

       $response = $this->actingAs($randomUser)->get(route('customer.team.show' , $team->id));
   
        $response->assertStatus(403);
   }

   public function test_user_cannot_edit_when_he_is_the_team_creator()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $teamCreatorResponse = $this->actingAs($teamCreator)->get(route('customer.team.edit' , $team));

        $teamCreatorResponse->assertStatus(200);

       $randomUser =  $this->genRandomUser();

       $response = $this->actingAs($randomUser)->get(route('customer.team.edit' , $team));
   
       $response->assertStatus(403);
   }

   public function test_user_creator_can_edit_team()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $response = $this->actingAs($teamCreator)->get(route('customer.team.edit' , $team));

        $response->assertStatus(200);
   }

}
