<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\Team;
use App\Models\Membership;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        
        Gate::define('create-team' , function($user)
        {
           $numberOfCreatedTeamByUser =  Team::where('creator_id',$user->id)->count();

           $maxNumberOfTeamForMemberShipe = Membership::where('id' , $user->membership_id)->value('number_of_team');
           
           if($numberOfCreatedTeamByUser >= $maxNumberOfTeamForMemberShipe)
           {
               return false;
           }else 
           {
               return true;
           }

        });

        Gate::define('create-link' , function($user)
        {

           $numberOfCreatedLinkByUser =  Link::where('added_by',$user->id)->count();

           $maxNumberOfLinkForMemberShipe = Membership::where('id' , $user->membership_id)->value('number_of_team') * Membership::where('id' , $user->membership_id)->value('number_of_link');
       
           if($numberOfCreatedLinkByUser >= $maxNumberOfLinkForMemberShipe)
           {
               return false;
           }else 
           {
               return true;
           }

        });
    }
}
