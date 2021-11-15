@extends('customer.layouts.app')
@section('content')
<div class="row">
   
    <div class="row d-flex align-items-center">
        <div class="col-auto">
            <h3 class="text-muted"><i class="feather icon-link"></i> link</h3>
        </div>
        <div class="col-auto">
            
            <a href="{{route('customer.link.create')}}" class="btn btn-sm btn-dark p-2 float-right"> <i class="feather icon-plus-circle"></i> link</a>
        
        </div>
    </div>
<div class="col-xl-12 col-md-12 mt-3">
    <div class="card Recent-Users">
        <div class="card-block px-0 py-0">
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead class="">
                        @if(count($links) > 0 )
                        
                        <tr>
                            <th>Url</th>
                            <th>Team </th>
                            <th>Type </th>
                            <th>Added By  </th>
                            <th>Added at  </th>
                            <th> control </th>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                        @forelse ($links as $link)
                        <tr class="unread">
                            <td>
                            <h6 class="mb-1">{{$link->url}}</h6>
                           </td>
                           <td>
                               <h6 class="text-muted">{{$link->team->name}}</h6>
                           </td>
                           <td>
                            <h6 class="text-muted">{{$link->linkType->name}}</h6>
                          </td>
                          <td>
                            <h6 class="text-muted">{{$link->user->name}}</h6>
                        </td>
                           <td> {{$link->created_at->format('m-d-y')}} </td>
                           <td> 
                            <a class="mr-3" href="{{route('customer.link.edit' , $link->id)}}"><i class="feather icon-edit"></i> </a>     

                            <a  href="{{route('customer.link.destroy' , $link->id)}}"  onclick="event.preventDefault();
                                document.getElementById('delete-link').submit();"><i class="feather icon-trash text-danger"></i> </a>     
                            <form id="delete-link" action="{{ route('customer.link.destroy',$link->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form> 
                        </td>

                        </tr>
                        @empty
                            <div class="alert alert-info"> There is no link , please add new one  </div>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
 