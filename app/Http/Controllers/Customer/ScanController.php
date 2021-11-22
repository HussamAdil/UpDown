<?php

namespace App\Http\Controllers\Customer;

use App\Models\Scan;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScanController extends Controller
{
  
    public function index()
    {
        $teams = TeamMember::select('team_id')->where('user_id' , auth()->user()->id)->get();

        $scans =Scan::whereIn('team_id',$teams)->with('link','team.members')->orderBy('id','desc')->get();

        return view('customer.scan.index' ,compact('scans') );
    }
}
