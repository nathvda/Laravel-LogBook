@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/" class="back">← Back</a>

        @livewire('conversation-container', ['user' => $user])
            
        <a class="button__main" href="/new/conversation">Start a new conversation.</a>

@endsection