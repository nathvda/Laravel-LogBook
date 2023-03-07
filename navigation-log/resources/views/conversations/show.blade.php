@extends('app')
@section('title', 'Inbox')
@section('content')
    <a href="/inbox" class="back">← Back</a>
    <h3 class="main__title">{{$conversation->name}}</h3>
    @livewire('conversation-messages', ['id' => $conversation->id])

@endsection