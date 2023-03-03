@extends('app')
@section('title', 'voir le profil')
@section('content')

<a href="/" class="back">← Back</a>
<div class="maincontent">
    <h3>{{$user->username}}</h3>
    <h4>Rank</h4>
    <div class="avatar"><img src="/images/{{$user->avatar}}" alt="{{$user->username}}" /></div>

    <div class="infos">
        @if(auth()->user()->id !== $user->id)
        @csrf
            <form method="post" action="/connect/{{auth()->user()->id}}/{{$user->id}}">
            @csrf
            <button type="submit">+</button>
        </form>
        @endif
        <div class="friends__wrapper">
            @foreach($user->friendsaccepted() as $friend)
            <a href="/viewprofile/{{$friend->id}}">
                <div class="friendbox">
                    <span class="">{{$friend->name}}</span>
                    <img src="/images/{{$friend->avatar}}" />
            </a>
        </div>
        @endforeach
    </div>
    @if(auth()->user()->id === $user->id)
    <a href="/edit/{{$user->id}}" title="éditer mon profil"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
        </svg></a>
    <form method="post" action="/delete/{{$user->id}}">
        @csrf
        <button class="deleteAccount">Delete my account</button>
    </form>
    @endif

    <div class="profile_row"><label class="info__label">Name</label><span class="info__body">{{$user->name}}</span></div>
    <div class="profile_row"><label class="info__label">Joined</label><span class="info__body">{{$user->created_at->format('d/m/y')}}</span></div>
    <div class="profile_row"><label class="info__label">Entries</label><span class="info__body">{{count($user->entries)}}</span></div>
    <div class="profile_row"><label class="info__label">Friends</label><span class="info_body">{{count($user->friendsaccepted())}}</span></div>
</div>
</div>
@if(session()->has('success'))
<div class="success">{{session('success')}}</div>
@endif

@endsection