@extends('app')
@section('title', 'Visit profile :' . $user->name )
@section('content')

<form id="form-body" method="post" action="/edit/{{$user->id}}">
    @csrf
    @method('patch')
    <label for="name">Name</label>    
    <input type="text" id="name" name="name" value="{{$user->name}}"/>
    @if($errors->has('name'))
        <span class="error">{{$errors->first('name')}}</span>
    @endif
    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="{{$user->username}}"/>
    @if($errors->has('username'))
        <span class="error">{{$errors->first('username')}}</span>
    @endif
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{$user->email}}"/>
    @if($errors->has('email'))
        <span class="error">{{$errors->first('email')}}</span>
    @endif
    <input style="display:none" type="number" name="user_id" id="user_id" value="{{auth()->user()->id}}"/>
    @if($errors->has('user_id'))
        <span class="error">{{$errors->first('user_id')}}</span>
    @endif
    <label for="avatar">Avatar</label>
    <input type="text" id="avatar" name="avatar" value="{{$user->avatar}}"/>
    @if($errors->has('avatar'))
        <span class="error">{{$errors->first('avatar')}}</span>
    @endif
    <button type="submit" name="submit">Send modifications</button>
</form>
@endsection