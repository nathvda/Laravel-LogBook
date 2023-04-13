@extends('app')
@section('title', 'login page')
@section('content')
<a  class="back">← Back</a>
<form id="form-body" method="post" action="/login">
    @csrf
    <label for="email">email</label>
    <input type="text" name="email"/>
    @if($errors->has('email'))
        <span class="error"> {{ $errors->first('email')}}</span>
    @endif
    <label for="password">password</label>
    <input type="password" name="password"/>
    @if($errors->has('password'))
        <span class="error"> {{ $errors->first('password')}}</span>
    @endif
    <button type="submit">log in</button>
</form>
@endsection