@extends('customer.layouts.app')
@section('content')
<div class="row">
   
    <div class="row d-flex align-items-center">
        <div class="col-auto">
            <h3 class="text-muted"><i class="fa fa-paper-plane" aria-hidden="true"></i> Invitations</h3>
        </div>
    </div>
<div class="col-xl-12 col-md-12 mt-3">
    <div class="card Recent-Users">
        <div class="card-block px-0 py-0">
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead class="">
                        <tr>
                            <th>Team</th>
                            <th>invited by </th>
                            <th>invite at  </th>
                            <th> control </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invitations as $invitation)
                        <tr class="unread">
                            <td>
                            <h6 class="mb-1">{{$invitation->team->name}}</h6>
                           </td>
                           <td>
                               <h6 class="text-muted">{{$invitation->user->name}}</h6>
                           </td>
                           <td> {{$invitation->created_at}} </td>
                           <td>

                           <form id="reject-Reject-form" action="{{ route('customer.invitation.update' , $invitation->id) }}" method="POST" class=" d-inline-block">
                                @csrf
                                @method('PUT')
                                 <button type="submit" class="label btn-danger btn p-0 pl-3 pr-3 text-white f-12 " >Reject</button> 
                             
                               <input type="hidden" name="invitation_id" value="{{$invitation->id}}">
                                  
                                 <input type="hidden" name="status" value="0">

                                </form>
                                <form id="reject-accepet-form" action="{{ route('customer.invitation.update' , $invitation->id) }}" method="POST" class=" d-inline-block">
                                    @csrf
                                    @method('PUT') 
                                    <input type="hidden" name="invitation_id" value="{{$invitation->id}}">

                                    <input type="hidden" name="status" value="1">

                                    <input type="hidden" name="team_id" value="{{$invitation->team_id}}">

                                    <button href="#!" class="label btn-success btn p-0 pl-3 pr-3  text-dark f-12">Accepet</button>

                                </form>
                            </td>

                        </tr>
                       @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection