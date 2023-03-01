@extends('app')
@section('title', 'create a new entry')

@section('content')
<a href="/" class="back">← Back</a>
<form id="entrypost" method="POST" action="/entry/create">
    @csrf
    <label for="locations_id">Location <a href="/location/create" class="addlocation">Add a new location?</a></label> 
    <select id="locations_id" type="text" name="locations_id"/>
    <option name="locations_id" value="">Select a location</option>
    @foreach($locations as $location)

    <option name="locations_id" value="{{$location->id}}">{{$location->location}}</option>

    @endforeach
</select>
    @if($errors->has('locations_id'))
        <span class="error">{{$errors->first('locations_id')}}</span>
    @endif
    <label for="title">Title</label>
    <input type="text" name="title" id="title"/> 
    @if($errors->has('title'))
        <span class="error">{{$errors->first('title')}}</span>
    @endif
    <label for="entry">Content</label>
    <textarea form="entrypost" id="entry" name="entry">
</textarea>
@if($errors->has('entry'))
        <span class="error">{{$errors->first('entry')}}</span>
    @endif
<button id="sendform" type="submit" value="submit">Envoyer</button>

</form>

@endsection