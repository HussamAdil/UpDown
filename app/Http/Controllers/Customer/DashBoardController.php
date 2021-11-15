<?php

namespace App\Http\Controllers\Customer;

use App\Models\Link;
use App\Models\TeamMember;
use App\Http\Controllers\Controller;
use App\Models\Scan;

class DashBoardController extends Controller
{
    public function index()
    {
        $numberOfTeams = TeamMember::where('user_id' , auth()->user()->id)->with('teams')->count();

        $teams = TeamMember::where('user_id' , auth()->user()->id)->pluck('team_id')->toArray();

        $numberoflinks =Link::whereIn('team_id',$teams)->count();

        $scans = Scan::where('team_id' , $teams)->with('team' ,'link')->limit(8)->get();

       return view('customer.dashboard',compact('numberOfTeams','numberoflinks','scans'));
    }

}
