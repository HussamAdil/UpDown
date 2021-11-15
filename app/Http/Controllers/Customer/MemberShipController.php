<?php

namespace App\Http\Controllers\Customer;

use App\Models\Link;
use App\Models\Team;
use App\Models\Membership;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberShipController extends Controller
{
    public function index()
    {  
        $numberOfTeams = Team::where('creator_id' , auth()->user()->id)->count();

        $teams = TeamMember::where('user_id' , auth()->user()->id)->pluck('team_id')->toArray();

        $numberoflinks =Link::whereIn('team_id',$teams)->count();

        $membership = Membership::whereId(auth()->user()->membership_id)->first();

        return view('customer.membership.index' , compact('membership' , 'numberOfTeams','numberoflinks',));
    }
    
    
    public function upgrade()
    {
        $memberships = Membership::get();

        return view('customer.membership.upgrade',compact('memberships'));
    }
}
