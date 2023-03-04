@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/" class="back">← Back</a>

    <h5>Who do you want to talk to ?</h5>

    <form method="post" action="/new/conversation">
    @csrf
    <input type="text" value="Untitled Conversation" name="name"/>
    @foreach($friends as $friend)

    <label for="friend-{{$friend->id}}"><img class="avatar--nav" src="/images/{{ $friend->avatar }}"/>
    <div class="friend__card">
    {{ $friend->name }}
    <input id="friend-{{$friend->id}}" type="checkbox" name="user_id[]" value="{{$friend->id}}"/>
    </label>
    @endforeach
    <button type="submit">Start talking!</button>
    </form>

@endsection