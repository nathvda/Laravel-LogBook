@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/" class="back">← Back</a>

        @livewire('conversation-container', ['user' => $user])
            
        @if(count($user->conversations) !== 0)<a class="button__main" href="/new/conversation">Start a new conversation.</a>@endif

@endsection