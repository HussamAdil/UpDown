@extends('customer.layouts.app')
@section('content')
<div class="col-md-6">
    <h3 class="text-muted mb-3"><i class="feather icon-users"></i> Create Team</h3>
<form enctype="multipart/form-data" method="POST" action="{{route('customer.team.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter your team name">
            @if ($errors->has('name'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        </div>
         <div class="form-group">
            <label for="exampleInputLogo">Logo</label>

       <input name="logo" type="file" class="form-control">
         </div>
         @can('create-team')
         <button type="submit" class="btn btn-success text-dark mb-1"> <i class="feather icon-save"></i> Save</button>
         @else 
         <p class=" alert alert-warning">You reached the limit , <a class="text-dark" href="{{route('customer.membership.upgrade')}}">Click Here </a> to upgrade your membership</p>
         @endcan

    </form>
</div>
@endsection