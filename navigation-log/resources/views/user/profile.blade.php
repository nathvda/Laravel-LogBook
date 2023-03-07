@extends('app')
@section('title', 'Visit profile : ' . $user->name )
@section('content')

<a href="/" class="back">← Back</a>
<div class="maincontent">
    <h3>{{$user->username}}</h3>
    <h4>{{$user->rank}}</h4>
    <div class="avatar"><img src="/images/{{$user->avatar}}" alt="{{$user->username}}" /></div>

    <div class="infos">
    @if(auth()->user()->id != $user->id)
    
    @if($user->isRequested(auth()->user()->id))
    <form method="post" action="/connect/{{auth()->user()->id}}/{{$user->id}}">
            @csrf
            <button type="submit">Add as friend</button>
    </form>
    @else
    <form method="post" action="/connect/{{auth()->user()->id}}/{{$user->id}}">
            @csrf
            <button type="submit">Invite sent</button>
    </form>
    @endif
    @endif
        
        @if(auth()->user()->id === $user->id)
            <h4>They invited you</h4>
            <div class="friends__wrapper">
            @if($user->friendRequest($user->id)->count() === 0)
            <div class="nothing__to__show">No request.</div>
            @endif
            @foreach( $user->friendRequest($user->id)->get() as $friend)
            <a href="/viewprofile/{{$friend->id}}">
            <div class="friendwraps friends__pending">
                <div class="friendbox friendbox--pending">
                    <span class="">{{$friend->name}}</span>
                    <img src="/images/{{$friend->avatar}}" />
                    @if(auth()->user()->id === $user->id)
                    <form method="post" action="/decline/{{$friend->id}}/{{auth()->user()->id}}">
                    @csrf
                    <div class="button__wrapper">
                    <button type="submit">Decline</button>
                    </form>
                    <form method="post" action="/accept/{{auth()->user()->id}}/{{$friend->id}}">
                    @csrf
                    <button class="button--accept" type="submit">Accept</button>
                    </form>
                    </div>
                    @endif
                </div>  
            </a>
        </div>

        @endforeach
        </div>
        <h4>Sent invites</h4>
        <div class="friends__wrapper friends__waiting">
        @if($user->friendsPending($user->id)->count() === 0)
        <div class="nothing__to__show">You didn't invite anyone yet.</div>
        @endif
        @foreach( $user->friendsPending($user->id)->get() as $friend)
        <a href="/viewprofile/{{$friend->id}}">

                <div class="friendbox friendbox--pending">

                    <span class="">{{$friend->name}}</span>

                    <img src="/images/{{$friend->avatar}}" />

                    @if(auth()->user()->id === $user->id)

                    <form method="post" action="/disconnect/{{auth()->user()->id}}/{{$friend->id}}">

                        @csrf

                        <button type="submit">
                            Cancel invite
                        </button>

                    </form>

                    @endif
                </div>
        </a>
        @endforeach
        </div>
        @endif

        <h4>{{$user->name}}'s friends</h4>
            <div class="friends__wrapper">
            @if($user->friendsaccepted()->count() === 0)
            <div class="nothing__to__show">You don't have any friend yet.</div>
        @endif
            @foreach($user->friendsaccepted() as $friend)
            <a href="/viewprofile/{{$friend->id}}">
                <div class="friendbox">
                    <span class="">{{$friend->name}}</span>
                    <img src="/images/{{$friend->avatar}}" />
                    @if(auth()->user()->id === $user->id)
                    <form method="post" action="/disconnect/{{auth()->user()->id}}/{{$friend->id}}">
                    @csrf
                    <button type="submit">Unfriend</button>
                    </form>
                    @endif
            </a>

        </div>
        @endforeach
        </div>
    @if(auth()->user()->id === $user->id)
    <a href="/edit/{{$user->id}}" title="éditer mon profil"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
        </svg></a>
    @endif

    <div class="profile_row"><label class="info__label">Name</label><span class="info__body">{{$user->name}}</span></div>
    <div class="profile_row"><label class="info__label">Joined</label><span class="info__body">{{$user->created_at->format('d/m/y')}}</span></div>
    <div class="profile_row"><label class="info__label">Entries</label><span class="info__body">{{count($user->entries)}}</span></div>
    <div class="profile_row"><label class="info__label">Friends</label><span class="info_body">{{count($user->friendsaccepted())}}</span></div>
</div>

@if(auth()->user()->id === $user->id)
    <form method="post" action="/delete/{{$user->id}}">
        @csrf
        <button class="deleteAccount"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
</svg>Delete my account</button>
    </form>
    @endif
</div>
@if(session()->has('success'))
<div class="success">{{session('success')}}</div>
@endif
@if(session()->has('error'))
<div class="errorMessage">{{session('error')}}</div>
@endif

@endsection