@extends('customer.layouts.app')
@section('content')
<div class="row">
   
    <div class="row d-flex align-items-center">
        <div class="col-auto">
            <h3 class="text-muted"><i class="feather icon-users"></i> Teams</h3>
        </div>
        <div class="col-auto">
            
            <a href="{{route('customer.team.create')}}" class="btn btn-sm btn-dark p-2 float-right"> <i class="feather icon-plus-circle"></i> Team</a>
        </div>
        <div class="col-auto">
            <a href="{{route('customer.invitation.create')}}" class="btn btn-sm btn-dark p-2 "> <i class="feather icon-plus-circle"></i> Invite Member</a>

        </div>
        <div class="col-auto">
            <a href="{{route('customer.invitation.index')}}" class="btn btn-sm btn-dark p-2 "><i class="fa fa-paper-plane" aria-hidden="true"></i> My Invitations</a>
        </div>
        
    </div>
<div class="col-xl-12 col-md-12 mt-3">
    <div class="card Recent-Users">
        <div class="card-block px-0 py-0">
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead class="">
                        <tr>
                            <th>name</th>
                            <th>creator </th>
                            <th>Joined at  </th>
                            <th> control </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                        <tr class="unread">
                            <td>
                            <h6 class="mb-1">{{$team->team->name}}</h6>
                           </td>
                           <td>
                               <h6 class="text-muted">{{$team->team->creator->name}}</h6>
                           </td>
                           <td> {{$team->created_at}} </td>
                           <td> 
                            <a class="mr-3" href="{{route('customer.team.edit' , $team->team->id)}}"><i class="feather icon-edit"></i> </a>     

                            <a href="{{route('customer.team.show' , $team->team->id)}}"><i class="feather icon-eye"></i> </a>     
                          </td>

                        </tr>
                        @empty
                            
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection