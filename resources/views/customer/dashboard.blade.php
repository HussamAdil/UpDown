@extends('customer.layouts.app')
@section('content')
<div class="row">
<div class="col-md-6 col-xl-4">
    <div class="card daily-sales">
        <div class="card-block">
            <div class="row d-flex align-items-center">
                <div class="col-auto">
                    <i class="feather icon-globe f-30 text-dark"></i>
                </div>
                <div class="col">
                    <h3 class="f-w-300">{{$numberoflinks}}</h3>
                    <span class="d-block text-uppercase">Site</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="card daily-sales">
        <div class="card-block">
            <div class="row d-flex align-items-center">
                <div class="col-auto">
                    <i class="feather icon-users f-30 text-c-green"></i>
                </div>
                <div class="col">
                <h3 class="f-w-300">{{$numberOfTeams}}</h3>
                    <span class="d-block text-uppercase">Teams</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="card daily-sales">
        <div class="card-block">
            <div class="row d-flex align-items-center">
                <div class="col-auto">
                    <i class="feather icon-users f-30 text-c-blue"></i>
                </div>
                <div class="col">
                    <h3 class="f-w-300">4</h3>
                    <span class="d-block text-uppercase">Team</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-md-12">
    <div class="card Recent-Users">
        <div class="card-header">
            <h5><i class="fa fa-history  text-c-blue"></i> Scan Logs </h5>
        </div>
        <div class="card-block px-0 py-0">
            <div class="table-responsive ">
                <table class="table table-striped">

                    <thead class="">
                        <tr>
                            
                            <th>Url</th>
                            <th>Team</th>
                            <th>Http Code </th>
                            <th>status </th>
                            <th>scaned at </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scans as $scan)
                        <tr class="unread">
                            <td>
                            <h6 class="mb-1">{{ $scan->link->url}}</h6>
                           </td>
                           <td>
                            <h6 class="mb-1">{{ $scan->team->name}}</h6>
                           </td>
                           <td>
                               <h6 class="text-muted">{{ $scan->http_status_code}}</h6>
                           </td>
                           <td>
                           <h6 class="text-muted "><i class="fas fa-circle {{$scan->http_status_color}} f-10 m-r-15">
                           </td>
                           <td> {{ $scan->scaned_at}} </td>
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