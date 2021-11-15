<?php

namespace Database\Seeders;

use App\Models\LinkType;
use Illuminate\Database\Seeder;

class LinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linkTypes = [
            [
                'name' => 'website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'image',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        LinkType::insert($linkTypes);
    }
}
