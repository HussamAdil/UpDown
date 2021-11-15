@extends('customer.layouts.app')
@section('content')
<div class="row">
   <div class="col-sm-12">
    <h3 class="text-muted"><i class="feather icon-package"></i> MemberShip</h3>

   </div>
</div>
<div class="row mt-4">
  <h4 class=" text-muted col-12"><i class="fa fa-check-circle text-c-green"></i> {{$membership->name}} </h4>
  <div class="col-xl-12 col-md-12 mt-3">
   <div class="card Recent-Users">
       <div class="card-block px-0 py-0">
           <div class="table-responsive ">
               <table class="table table-striped">
                   <thead class="">  
                       <tr>
                          <th>Feature</th>
                           <th>MemberShip</th>
                           <th>Used </th>
                       </tr>
                   </thead>
                 
                   <tbody>
                       
                       <tr class="unread">
                           <td>
                           <h6 class="mb-1">Number Of Links</h6>
                          </td>
                          <td>
                              <h6 class="text-muted">{{$membership->number_of_link}}</h6>
                          </td>
                          <td>
                           <h6 class="text-muted">{{$numberoflinks}}</h6>
                       </td>
                       </tr>
                       <tr class="unread">
                        <td>
                        <h6 class="mb-1">Number Of Teams</h6>
                       </td>
                       <td>
                           <h6 class="text-muted">{{$membership->number_of_team}}</h6>
                       </td>
                       <td>
                        <h6 class="text-muted">{{$numberOfTeams}}</h6>
                    </td>
                    </tr>
                   </tbody>
               </table>
              
           </div>
           
       </div>
   </div>
<a  href="{{route('customer.membership.upgrade')}}" class="btn alert alert-warning p-2 text-dark bordered  "> <i class="feather icon-chevrons-up"></i> upgrade now </a>

</div> 
</div>
@endsection