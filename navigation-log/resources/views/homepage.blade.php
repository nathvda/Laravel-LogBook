@extends('app')
@section('content')

<div class="links"><a href="register">register</a>
<a href="login">login</a></div>

@if(session()->has('success'))
    <div class="success">{{session('success')}}</div>
    @endif
@endsection