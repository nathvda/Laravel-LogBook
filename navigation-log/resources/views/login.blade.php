@extends('app')
@section('title', 'login page')
@section('content')
<form method="post" action="/login">
    @csrf
    <label for="username">username</label>
    <input type="text" name="username"/>
    @if($errors->has('username'))
        <span class="error"> {{ $errors->first('username')}}</span>
    @endif
    <label for="password">password</label>
    <input type="password" name="password"/>
    <button type="submit">log in</button>
</form>
@endsection