<?php

namespace App\Policies\Customer;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamMember;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Team  $Team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Team $team)
    {
        $members = TeamMember::where('team_id' , $team->id)->where('user_id' , $user->id)->pluck('user_id')->toArray();

        return  in_array($user->id ,$members) ? Response::allow()
        
        : Response::deny('You are not member join first.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }
    public function edit(User $user, Team $team)
    {
        $team = Team::where('id' , $team->id)->where('creator_id' , $user->id)->exists();
        
        if($team)
        {
            return  Response::allow();
        }else 
        {
            Response::deny('You are not the creator of the team ');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Team  $Team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Team $team)
    {
        $team = Team::where('id' , $team->id)->where('creator_id' , $user->id)->exists();
        
        if($team)
        {
            return  Response::allow();
        }else 
        {
            Response::deny('You are not the creator of the team ');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Team  $Team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Team $Team)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Team  $=Team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Team $Team)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\=Team  $=Team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Team $Team)
    {
        //
    }
}
