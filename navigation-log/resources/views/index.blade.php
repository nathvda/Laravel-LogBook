@extends('app')
@section('title', 'Welcome on board, ' . auth()->user()->name)

@section('content')
<a href="./entry/create" class="createNew">+</a>
<form method="GET" action="#">
    <input type="text" id="search" name="search" placeholder="find an entry" />
</form>

@if(session()->has('success'))
<div class="success">{{session('success')}}</div>
@endif

<div class="pagination">
    {{$entries->links()}}
</div>
<div class="entries__wrapper">

    @if(count($entries) === 0)
    No entries.
    @else
    @foreach($entries as $entry)

    <div class="entry__block">
        <h3>{{$entry->title}}</h3>

        <div class="entry__content">
            <p class="entry__post">{{$entry->entry}}</p>
            <div class="infoblocks">
                <a href="/viewprofile/{{$entry->user->id}}" class="entry__avatar" /><img class="avatar--small" src="/images/{{$entry->user->avatar}}"></a>
                <a class="entry__username" href="/user/show/{{$entry->user->id}}">{{$entry->user->name}}</a>
                </span>
                <a class="tag__location" href="/location/show/{{$entry->location->id}}">#{{$entry->location->location}}</a>
                <span class="date">Créé le : {{$entry->created_at->diffForHumans()}}</span>
                <span class="date">Modifié le : {{$entry->updated_at->diffForHumans()}}</span>
            </div>
            @if(auth()->user()->id === $entry->user->id)
            <span class="toolbox">
                <form method="POST" action='/entry/delete/{{$entry->id}}'>
                    @csrf
                    @method('delete')
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg></button>
                </form>
                <a href="/entry/edit/{{$entry->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                    </svg></a>
            </span>@endif
        </div>
        <div class="categories">@foreach($entry->category as $cat)
            <div class="category__button">{{$cat->name}}</div>
            @endforeach
        </div>
            @livewire('like', ['entry' => $entry])

    </div>


    @endforeach
    @endif
</div>
<div class="pagination">
    {{$entries->links()}}
</div>

@endsection