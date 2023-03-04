@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/inbox" class="back">← Back</a>
    <div class="messages__wrapper">
    @foreach($conversation->messages as $message)
        @if($message->user->id == auth()->user()->id)
        <div class="message message--yours"><div class=""><img class="avatar--messages" src="/images/{{$message->user->avatar}}"></div><div class="message__infos"><p>{{$message->content}}</p><span class="message__date">{{$message->created_at->diffForHumans()}}</span></div></div>
        @else
        <div class="message message--theirs"><div class=""><img class="avatar--messages" src="/images/{{$message->user->avatar}}"></div><div class="message__infos"><p>{{$message->content}}</p><span class="message__date">{{$message->created_at->diffForHumans()}}</span></div></div>
        @endif
    @endforeach
    <form id="message__send" method="post" action="/conversation/{{$conversation->id}}">
        @csrf
    <input style="display:none" name="user_id" value="{{auth()->user()->id}}"/>
    <input style="display:none" name="conversation_id" value="{{$conversation->id}}"/>
    <input placeholder="Enter your message" name="content"/>
    </form>
    </div>

@endsection