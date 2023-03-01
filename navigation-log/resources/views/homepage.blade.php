@extends('app')
@section('content')
Hi.

<a href="register">register</a>
<a href="login">login</a>

@if(session()->has('success'))
    <div class="success">{{session('success')}}</div>
    @endif
@endsection