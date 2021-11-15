@extends('customer.layouts.app')
@section('content')
<div class="row">
   <div class="col-sm-12">
    <h3 class="text-muted"><i class="feather icon-chevrons-up"></i> Upgrade MemberShip</h3>

   </div>
</div>
<div class="row mt-4">
    @foreach ($memberships as $membership)
    <div class="ml-5 mr-4 mb-3 col-md-3 col-sm-12  text-center p-4 @if($membership->id ==2){{'membership-box-business'}}@else {{'membership-box'}} @endif">
        
        <h3 class="mt-4 mb-4  @if($membership->id ==2){{'text-white'}}@endif">{{$membership->name}}</h3>
        <h4 class=" @if($membership->id ==2){{'text-white'}}@endif"> <sup>$</sup>{{$membership->price}}/m</h4>
        <ul class="mt-4 list-unstyled">
        <li>number of link : {{$membership->number_of_link}}</li><hr>
        <li>number of team : {{$membership->number_of_team}}</li><hr>
        @if(auth()->user()->membership_id ==$membership->id )
        <a style="background:#f4f6fa"  href="{{route('customer.membership.index')}}" class="btn btn-sm p-1 pr-3 pl-3  text-dark btn-rounded"> <i class="fa fa-check-circle text-dark"></i>  Active </a>
        @else 
             @if($membership->id == 2 )
            <a href="#" class="btn btn-sm p-1 pr-3 pl-3 bg-white btn-rounded"> Soon </a>
            @else 
            <a href="#" style="background:#466393" class="btn btn-sm p-1 pr-3 pl-3 text-white btn-rounded"> Soon </a>
            @endif
        @endif
        </ul>
     </div>
    @endforeach
    
  
</div>
@endsection