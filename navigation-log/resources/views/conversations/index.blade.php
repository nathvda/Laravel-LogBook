@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/" class="back">← Back</a>
        <h4>Welcome to your conversation log.</h4>

        @livewire('conversation-container', ['user' => $user])
            

@endsection