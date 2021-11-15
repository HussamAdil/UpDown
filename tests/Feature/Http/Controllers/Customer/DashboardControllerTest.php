<?php

namespace Tests\Feature\Http\Controllers\Customer;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_must_login_to_access_dashboard()
    {
        $response = $this->get(route('customer.dashboard.index'));

        $response->assertStatus(302);
    }

    public function test_loggedin_user_can_access_databoard()
    {
        $creatUser = User::factory()->createOne();

        $user = User::where('id',$creatUser->id)->first();

        $response = $this->actingAs($user)->get(route('customer.dashboard.index'));

        $response->assertStatus(200);
    }
 
}
