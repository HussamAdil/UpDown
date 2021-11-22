<?php

namespace Tests\Feature\Http\Controllers\Customer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helper;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase,Helper;

    public function test_user_must_login_to_access_dashboard()
    {
        $response = $this->get(route('customer.dashboard.index'));

        $response->assertStatus(302);
    }

    public function test_loggedin_user_can_access_databoard()
    {
        $user =  $this->createUser();

        $response = $this->actingAs($user)->get(route('customer.dashboard.index'));

        $response->assertStatus(200);
    }
 
}
