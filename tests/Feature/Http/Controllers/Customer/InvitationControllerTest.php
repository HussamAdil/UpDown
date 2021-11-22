<?php

namespace Tests\Feature\Http\Controllers\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Testing\Fakes\NotificationFake;
use Tests\TestCase;
use Tests\Helper;
class InvitationControllerTest extends TestCase
{
    use Helper,RefreshDatabase;


    public function test_user_must_login_to_access_invitation()
   {

       $response = $this->get(route('customer.invitation.index'));

       $response->assertStatus(302);

       $user =  $this->createUser();
     
       $UserResponse = $this->actingAs($user)->get(route('customer.invitation.index'));

       $UserResponse->assertStatus(200);

   }

   public function test_user_can_store_invitation()
   {
       $teamCreator =  $this->createUser();

       $team = $this->createTeamByUser($teamCreator);

       $response = $this->actingAs($teamCreator)->post(route('customer.invitation.store'),
       ['email' => 'newmember@mail.com','team_id' => $team->id]);
       
      $response->assertRedirect(route('customer.team.index'));

       $this->assertDatabaseCount('invitations' , 1);

   }

}
