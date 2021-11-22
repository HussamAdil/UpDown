@extends('customer.layouts.app')
@section('content')
<div class="row">
    <div class="row d-flex align-items-center">
        <div class="col-auto">
            <h3 class="text-muted"><i class="fa fa-history "></i> Scan logs</h3>
        </div>
     
        
    </div>
   <div class="col-xl-12 col-md-12 mt-3">
    <div class="">
        <div class="card-block px-0 py-0">
           {{-- <div class="row mb-1">
            <form class="col-sm-4">
                <select class="form-control">
                    <option> Fitter By Team</option>
                    @foreach ($scans as $scan)
                   <option value="{{$scan->team->id}}">{{$scan->team->name}}</option>
                    @endforeach
                </select>
            </form>
            <form class="col-sm-4">
                <select class="form-control">
                    <option> Fitter By Link</option>
                    @foreach ($scans as $scan)
                        <option value="{{$scan->link_id}}">{{ $scan->link->url}} </option>
                    @endforeach
                </select>
             </form>
           </div> --}}
            <div class=" card table-responsive ">
                
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