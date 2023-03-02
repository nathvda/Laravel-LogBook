@extends('app')
@section('title', 'add a location')
@section('content')
    <a href="/entry/create" class="back">← Back</a>
        <form id="form-body" method="POST" action="/location/create">
            @csrf
            <label for="location">Location</label>
            <input name="location" type="text" value="{{@old('location')}}">
                @if($errors->has('location'))
                    <span class="error">{{$errors->first('location')}}</span>
                @endif
            <button type="submit" value="submit" name="submit">Add Location</button>
        </form>
@endsection