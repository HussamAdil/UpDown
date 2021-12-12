<?php

namespace App\Http\Controllers\Customer;

use App\Models\Link;
use App\Models\User;
use App\Models\LinkType;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\LinkCreatedNotification;
use App\Http\Requests\Customer\LinkStoreRequest;
use App\Http\Requests\Customer\LinkUpdateRequest;
use App\Models\Scan;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = TeamMember::select('team_id')->where('user_id' , auth()->user()->id)->get();

        $links =Link::whereIn('team_id',$teams)->with('team','linkType','user')->orderBy('id','desc')->get();

        return view('customer.link.index' ,compact('links') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = TeamMember::where('user_id' , auth()->user()->id)->with('team')->orderBy('id','desc')->get();

        $linkTypes = LinkType::get();

        return view('customer.link.create' , compact('teams','linkTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkStoreRequest $request)
    {
        $link  = Link::create(['url' => $request->url ,
                             'link_type_id' => $request->link_type_id,
                             'team_id' => $request->team_id,
                             'added_by'=> auth()->user()->id]);
      
        $UsersIds = TeamMember::where('team_id' , $request->team_id)->pluck('user_id')->toArray();
    
         $teammates =   User::where('id','!=', auth()->user()->id)->whereIn('id' , $UsersIds)->get();

        foreach($teammates as $teammate)
        {
            $teammate->notify(new LinkCreatedNotification($link));
        }

         return redirect(route('customer.link.index'))->withSuccessMessage('link created successfully');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = TeamMember::where('user_id' , auth()->user()->id)->with('team')->orderBy('id','desc')->get();

        $linkTypes = LinkType::get();

        $link = Link::whereId($id)->first();

        return view('customer.link.edit' , compact('teams','linkTypes','link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkUpdateRequest $request, Link $link)
    {
        $this->authorize('update' , $link);

        Link::whereId($link->id)->update(['url'=>$request->url,
                            'link_type_id' => $request->link_type_id,
                            'team_id' => $request->team_id,]);
        
        return redirect(route('customer.link.index'))->withSuccessMessage('link updated successfully');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {  
        $this->authorize('delete' , $link);
     
        Scan::where('link_id' , $link->id)->delete();

        Link::whereId($link->id)->delete();

        return redirect(route('customer.link.index'))->withSuccessMessage('link deleted successfully');

    }
}
