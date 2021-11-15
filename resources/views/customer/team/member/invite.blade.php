@extends('customer.layouts.app')
@section('content')
<div class="col-md-6">
    <h3 class="text-muted mb-3"><i class="feather icon-user"></i> invite Member</h3>
<form enctype="multipart/form-data" method="POST" action="{{route('customer.invitation.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail">Url</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="EmailHelp" placeholder="Enter email">
             @if ($errors->has('email'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group">
            <label for="TeamType">Team </label>
        <select name="team_id" id="TeamType" class="form-control">
            <option value="">Select Team</option>
            @foreach ($teams as $team)
           <option value="{{$team->id}}">{{$team->name}} </option>

            @endforeach
        </select>
        @if ($errors->has('team_id'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('team_id') }}</strong>
        </span>
    @endif
        </div>
        <button type="submit" class="btn btn-success text-dark mb-1"> <i class="feather icon-save"></i> Save</button>

          {{-- @can('create-link')
        <button type="submit" class="btn btn-success text-dark mb-1"> <i class="feather icon-save"></i> Save</button>
        @else 
        <p class=" alert alert-warning">You reached the limit , <a class="text-dark" href="{{route('customer.membership.upgrade')}}">Click Here </a> to upgrade your membership</p>
        @endcan --}}
    </form>
</div>
@endsection