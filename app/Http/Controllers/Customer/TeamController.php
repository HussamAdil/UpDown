<?php

namespace App\Http\Controllers\Customer;

use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\TeamStoreRequest;
use App\Http\Requests\Customer\TeamUpdateRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teams = TeamMember::where('user_id' , auth()->user()->id)->with('team.creator')
                            ->orderBy('id','desc')->get();
        
       return view('customer.team.index' , compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        $image = null;

        if($request->hasFile('image'))
        {
            $image = $request->image->store('public');
        }
        
        $team = Team::create(['name'=>$request->name,'image' => 
                  $image,'creator_id' => auth()->user()->id]);
        
       TeamMember::create(['team_id' => $team->id , 'user_id' => auth()->user()->id]);

        return redirect(route('customer.team.index'))->withSuccessMessage('data saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $this->authorize('view' , $team);

        $team = Team::whereId($team->id)->first();

        $members = TeamMember::where('team_id' , $team->id)->with('user')->orderBy('id','desc')->get();
         
        return view('customer.team.show' , compact('team','members'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $this->authorize('edit' , $team);

        $team = Team::whereId($team->id)->first();

        return view('customer.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request,Team $team )
    {
        $this->authorize('update' , $team);

        if($request->hasFile('updateLogo'))
        {
            $image = $request->updatedimage->store('public');

            Team::whereId($team->id)->update(['name'=>$request->name,'image' => $image]);
        }else
        {
            Team::whereId($team->id)->update(['name'=>$request->name]);
        }

        return redirect(route('customer.team.index'))->withSuccessMessage('Updated successfully');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
