<?php

namespace Tests\Feature\Http\Controllers\Customer;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helper;

class TeamControllerTest extends TestCase
{
   use RefreshDatabase , Helper;

   public function test_user_must_login_to_access_team()
   {
       $response = $this->get(route('customer.team.index'));

       $response = $this->get(route('customer.team.index'));

       $response->assertStatus(302);

       $user =  $this->createUser();
     
       $UserResponse = $this->actingAs($user)->get(route('customer.team.index'));

       $UserResponse->assertStatus(200);
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

   public function test_team_members_only_can_show_team_info()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $teamCreatorResponse = $this->actingAs($teamCreator)->get(route('customer.team.show' , $team));

        $teamCreatorResponse->assertStatus(200);

       $randomUser =  $this->createUser();

       $response = $this->actingAs($randomUser)->get(route('customer.team.show' , $team->id));
   
        $response->assertStatus(403);
   }

   public function test_team_creator_can_edit_team()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $teamCreatorResponse = $this->actingAs($teamCreator)->get(route('customer.team.edit' , $team));

        $teamCreatorResponse->assertStatus(200);

       $randomUser =  $this->createUser();

       $response = $this->actingAs($randomUser)->get(route('customer.team.edit' , $team));
   
       $response->assertStatus(403);
   }

   public function test_team_creator_can_update_team()
   {
       $teamCreator =  $this->createUser();

        $team = $this->createTeamByUser($teamCreator);
      
        $teamCreatorResponse = $this->actingAs($teamCreator)->put(route('customer.team.update' , $team),
    ['name' => 'new name']);

        $teamCreatorResponse->assertStatus(302);

        $teamCreatorResponse->assertSessionHas(['success_message']);

       $randomUser =  $this->createUser();

       $randomUserResponse = $this->actingAs($randomUser)->put(route('customer.team.update' , $team),
       ['name' => 'new name']);  

       $randomUserResponse->assertStatus(403);
   }

}
