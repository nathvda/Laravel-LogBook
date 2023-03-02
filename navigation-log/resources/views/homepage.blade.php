@extends('app')
@section('title', 'Welcome traveller')
@section('content')

<div class="homepage__links"><a href="register">register</a>
<a href="login">login</a></div>

@if(session()->has('success'))
    <div class="success">{{session('success')}}</div>
    @endif
@endsection