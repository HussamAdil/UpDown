<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $memberships = [
            [
                'name' => 'Starter MemberShip',
                'descrption' => 'descrption for starter plan',
                'price' => 0,
                'offer' => 'offer for starter plan',
                'number_of_link' => 2,
                'number_of_team' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business MemberShip',
                'descrption' => 'descrption for Business plan',
                'price' => 20,
                'offer' => 'offer for Business plan',
                'number_of_link' => 10,
                'number_of_team' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Enterprise MemberShip',
                'descrption' => 'descrption for Enterprise plan',
                'price' => 50,
                'offer' => 'offer for Enterprise plan',
                'number_of_link' => 50,
                'number_of_team' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Membership::insert($memberships);

    }
}
