@extends('app')
@section('title', 'edit an entry')

@section('content')
<a href="/">← Back</a>
<form id="form-body" method="POST" action="/entry/edit/{{$entry->id}}">
    @csrf
    @method('patch')
    <label for="locations_id">Location <a href="/location/create" class="addlocation">Add a new location?</a></label> 
    <select class="selectable" id="locations_id" type="text" name="locations_id"/>
    <option name="locations_id" value="">Select a location</option>
    @foreach($locations as $location)

    <option name="locations_id" value="{{$location->id}}" @if($entry->locations_id === $location->id) selected @endif>{{$location->location}}</option>
    
    @endforeach
</select>
    @if($errors->has('locations_id'))
        <span class="error">{{$errors->first('locations_id')}}</span>
    @endif
    <label for="category_id">Category</label> 
    <select class="selectable" id="category_id" type="text" name="category_id"/>
    <option name="category_id" value="">Select a category</option>
    @foreach($categories as $category)

    <option name="category_id" value="{{$category->id}}" @if($entry->locations_id === $category->id) selected @endif>{{$category->name}}</option>

    @endforeach
</select>
    @if($errors->has('category_id'))
        <span class="error">{{$errors->first('category_id')}}</span>
    @endif
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{$entry->title}}"/> 
    @if($errors->has('title'))
        <span class="error">{{$errors->first('title')}}</span>
    @endif
    <label for="entry">Contenu</label>
    <textarea form="form-body" id="entry" name="entry">
    {{$entry->entry}}
</textarea>
    @if($errors->has('entry'))
        <span class="error">{{$errors->first('entry')}}</span>
    @endif
<button id="sendform" type="submit" value="submit">Envoyer</button>

</form>

@endsection