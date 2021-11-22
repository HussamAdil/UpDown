<?php 

namespace Tests;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamMember;

trait Helper{

    
   private function  createUser()
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
}

?>