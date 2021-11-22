@extends('customer.layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('dashboard-assets/plugins/chart-morris/css/morris.css')}}">

<div class="row">
   <div class="col-sm-12">
    <h3 class="text-muted"><i class="feather icon-package"></i> MemberShip</h3>

   </div>
</div>
<div class="row mt-4" >
  <h4 class=" text-muted col-12 mb-4" ><i class="fa fa-check-circle text-c-green"></i> {{$membership->name}} </h4>
  <div class="col-xl-8 col-md-8 " >
   <div class="card Recent-Users">
       <div class="card-block px-0 py-0">
           <div class="table-responsive ">
               <table class="table table-striped" style="height:200px">
                   <thead class="">  
                       <tr>
                          <th>Feature</th>
                           <th>MemberShip offer</th>
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
</div> 
<div class="col-sm-4">
    <div class="card">
        <div class="card-header">
            <h5> Link Used </h5>
        </div>
        <div class="card-block">
            <div id="morris-donut-chart" style="height:200px"></div>
        </div>
    </div>
</div>
@section('script')
<script src="{{asset('dashboard-assets/plugins/chart-morris/js/raphael.min.js')}}"></script>

<script src="{{asset('dashboard-assets/plugins/chart-morris/js/morris.min.js')}}"></script>
<script>
    'use strict';
$(document).ready(function() {
    setTimeout(function() {       
        var graph = Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
                value:{{$membership->number_of_link}},
                label: 'membership offer'
            },
            {
                value:{{$numberoflinks}},
                label: 'used links'
            }
        ],
        colors: [
            '#1de9b6',
            '#A389D4',
            '#04a9f5',
            '#1dc4e9',
        ],
        resize: true,
        formatter: function(x) {
            return "val : " + x
        }
    });
     }, 700);
});

</script>  
@endsection
<a  href="{{route('customer.membership.upgrade')}}" class="btn alert alert-warning p-2 text-dark bordered  "> <i class="feather icon-chevrons-up"></i> upgrade now </a>

</div>
@endsection