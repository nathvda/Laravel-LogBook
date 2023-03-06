@extends('app')
@section('title', 'add a category')
@section('content')
    <a href="/entry/create" class="back">← Back</a>
        <form id="form-body" method="POST" action="/category/create">
            @csrf
            <label for="name">Name</label>
            <input name="name" type="text" value="{{@old('name')}}">
                @if($errors->has('name'))
                    <span class="error">{{$errors->first('name')}}</span>
                @endif
            <button type="submit" value="submit" name="submit">Add name</button>
        </form>
        @if(session()->has('success'))
    <div class="success">{{session('success')}}</div>
    @endif
@endsection