@extends('customer.layouts.app')
@section('content')
<div class="col-md-6">
    <h3 class="text-muted mb-3"><i class="feather icon-link"></i> Edit link</h3>
<form enctype="multipart/form-data" method="POST" action="{{route('customer.link.update' , $link->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputUrl">Url</label>
            <input name="url" value={{$link->url}} type="text" class="form-control" id="exampleInputUrl" aria-describedby="urlHelp" placeholder="Enter url">
            <small id="UrlHelp" class="form-text text-muted">vaid url example : https://google.com.</small>
            @if ($errors->has('url'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
        </div>
         <div class="form-group">
            <label for="linkType">Link Type</label>
        <select name="link_type_id" id="linkType" class="form-control">
            <option value="">Select link Type</option>
            @foreach  ($linkTypes as $linkType)
        <option @if($link->link_type_id == $linkType->id) {{'selected'}} @endif value="{{$linkType->id}}">{{$linkType->name}} </option>

            @endforeach
        </select>
        @if ($errors->has('link_type_id'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('link_type_id') }}</strong>
        </span>
    @endif
        </div>
        <div class="form-group">
            <label for="TeamType">Team </label>
        <select name="team_id" id="TeamType" class="form-control">
            <option value="">Select Team</option>
            @foreach ($teams as $team)
           <option @if($link->team_id == $team->team->id) {{'selected'}} @endif value="{{$team->team->id}}">{{$team->team->name}} </option>

            @endforeach
        </select>
        @if ($errors->has('team_id'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('team_id') }}</strong>
        </span>
    @endif
        </div>

        <button type="submit" class="btn btn-success text-dark mb-1"> <i class="feather icon-save"></i> Save</button>
    </form>
</div>
@endsection