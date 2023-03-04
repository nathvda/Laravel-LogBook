@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/" class="back">← Back</a>
        <h4>Welcome to your conversation log.</h4>

        @if(count($user->conversations) == 0)

            No conversation.

        @else 
<div class="conversations_wrapper">
@foreach($user->conversations as $conversation)

    <div class="conversation_unique">

    <a href="/conversation/{{$conversation->id}}">{{$conversation->name}}</a>

    </div>

@endforeach

</div>
            

        @endif
@endsection