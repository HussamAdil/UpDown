<?php

namespace App\Http\Controllers\Customer;

use App\Models\Team;
use App\Models\User;
use App\Models\Invitation;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeamMemberInvitationSendMail;
use App\Notifications\TeamMemberInvitationSendNotification;
use App\Http\Requests\Customer\TeamMemberInvitationStoreRequest;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->markInvitationsAsRead();

        $invitations = Invitation::pendding()->get();

        return view('customer.team.invitation',compact('invitations'));
    }

    private function markInvitationsAsRead()
    {
        Invitation::where('email' , auth()->user()->email)->update(['read_at'=>now()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::where('creator_id' , auth()->user()->id)->orderBy('id','desc')->get();

        return view('customer.team.member.invite',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamMemberInvitationStoreRequest $request)
    {
         
        if($this->isUserAlreadyJoinedTeam($request->email,$request->team_id) || $this->isInvitationIsPendding($request->email,$request->team_id))
        {
           return redirect(route('customer.team.index'))->withSuccessMessage('User Already invited to Your Team');
        }else 
        {
            $invitation = Invitation::create(['email' => $request->email,
            'send_by' => auth()->user()->id ,
            'team_id' => $request->team_id]);

        // Mail::to($request->email)->send(new TeamMemberInvitationSendMail($invitation));

        // $user = User::where('email' ,$request->email)->first();

        // if(!is_null($user))
        // {
        //     $user->notify(new TeamMemberInvitationSendNotification($invitation));
        // }

        return redirect(route('customer.team.index'))->withSuccessMessage('invitation send successfully');
     }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invitation = Invitation::whereId($id)
                        ->where('email' , auth()->user()->email)->update(['read_at'=>now()]);

        return redirect(route('customer.invitation.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->status)
        {
            $invitation = Invitation::whereId($request->invitation_id)
            ->where('email' , auth()->user()->email)
            ->where('accepted_at',null)->where('rejected_at'.null)->update(['read_at'=>now(),'accepted_at' => now()]);
            #send email to team creator
            TeamMember::create(['user_id' => auth()->user()->id , 'team_id' => $request->team_id]);
        }else
        {
            $invitation = Invitation::whereId($request->invitation_id)
            ->where('email' , auth()->user()->email)
            ->where('accepted_at',null)->where('rejected_at'.null)->update(['read_at'=>now(),'rejected_at' => now()]);
        }
        
        return redirect(route('customer.team.index'))->withSuccessMessage('invitation status updated successfully');
    }

    private function isUserAlreadyJoinedTeam($userEmail,$teamId)
    {
        $user = User::where('email' ,$userEmail)->first();
        if($user)
        {
            $isAlreadyJoined = TeamMember::where('user_id' ,$user->id)->where('team_id',$teamId)->count();
        
            return $isAlreadyJoined;
        }
        else 
        {
            return false;
        }
    }
    
    private function isInvitationIsPendding($userEmail,$teamId)
    {
        $isInvitationIsPendding = Invitation::where('email' , $userEmail)->
                                        where('team_id',$teamId)->where('accepted_at',null)
                                        ->where('rejected_at'.null)->count();

         return $isInvitationIsPendding;                       
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
