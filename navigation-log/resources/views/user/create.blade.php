@extends('app')
@section('title', 'register')
@section('content')
    <a href="/" class="back">← Back</a>
        <form class="entrypost" method="POST" action="/register">
            @csrf
            <label for="name">name</label>
            <input name="name" type="text" value="{{@old('name')}}">
                @if($errors->has('name'))
                    <span class="error">{{$errors->first('name')}}</span>
                @endif
            <label for="username">username</label>
            <input name="username" type="text" value="{{@old('username')}}">
                @if($errors->has('username'))
                    <span class="error">{{$errors->first('username')}}</span>
                @endif
                <label for="email">email</label>
            <input name="email" type="email" value="{{@old('email')}}">
                @if($errors->has('email'))
                    <span class="error">{{$errors->first('email')}}</span>
                @endif
                <label for="password">password</label>
                <input name="password" type="password">
                @if($errors->has('password'))
                    <span class="error">{{$errors->first('password')}}</span>
                @endif
            <button type="submit" value="submit" name="submit">Add Location</button>
        </form>
@endsection