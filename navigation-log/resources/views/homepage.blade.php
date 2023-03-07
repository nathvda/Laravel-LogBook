@extends('app')
@section('title', 'Welcome traveller')
@section('content')

<div class="homepage__links"><a href="register">register</a>
<a href="login">login</a></div>

<div class="homepage__block"><form id="form-body" method="post" action="/login">
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
</div>
@if(session()->has('success'))
    <div class="success">{{session('success')}}</div>
    @endif
@endsection