@extends('customer.layouts.app')
@section('content')
<div class="row">
    
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-block border-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-auto">
                        <i class="feather icon-info f-30 text-c-green"></i>
                    </div>
                    <div class="col">
                        <h4 class="text-muted mb-3"> Team info </h4>

                        <span class="d-block text-capitalize"> name : {{$team->name}}</span>
                        <span class="d-block text-capitalize mt-2"> creator : {{$team->creator->name}}</span>
                        <span class="d-block text-capitalize mt-2"> created at  : {{$team->created_at->format('m-d-y')}}</span>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
<div class="row d-flex align-items-center">
    <div class="col-auto">
        <h4 class="text-muted" ><i class="feather icon-users"></i> Team Members </h4>
    </div>
    <div class="col-auto">
        <a href="{{route('customer.invitation.create')}}" class="btn btn-sm btn-dark p-2 "> <i class="feather icon-plus-circle"></i> Invite Member</a>
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
                            <th>email </th>
                            <th>Joined at  </th>
                            <th>Control  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $member)
                        <tr class="unread">
                            <td>
                            <h6 class="mb-1">
                                @if($team->creator_id == $member->user->id)
                                <i class="feather icon-star"></i> 
                                @endif
                                 {{$member->user->name}}</h6>
                           </td>
                           <td>
                               <h6 class="text-muted">{{$member->user->email}}</h6>
                           </td>
                           <td> {{$member->created_at}} </td>
                           <td>
                            <a title="remove from team" href="#"><i class="feather icon-trash text-danger"></i> </a>     

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

@endsection