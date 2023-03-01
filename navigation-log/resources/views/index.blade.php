@extends('app')
@section('title', 'Welcome on board')

@section('content')
<a href="./entry/create" class="createNew">+</a>
<form method="GET" action="#">
        <input type="text" id="search" name="search" placeholder="find an entry"/>
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
        <div class="infoblocks"><span class="date">Créé le : {{$entry->created_at->diffForHumans()}}</span>
        <span class="date">Modifié le : {{$entry->updated_at->diffForHumans()}}</span>
        <span class="date">Par : <a href="/user/show/{{$entry->user->id}}">{{$entry->user->name}}</a></span></div>
        <p class="entry__post">{{$entry->entry}}</p>
        <a class="tag__location" href="/location/show/{{$entry->location->id}}">#{{$entry->location->location}}</a>
        <span class="toolbox"><form method="POST" action='/entry/delete/{{$entry->id}}'>
            @csrf
            @method('delete')
            <button type="submit">x</button>
        </form>
        <a href="/entry/edit/{{$entry->id}}">Edit</a>
</span>
    </div>

@endforeach
@endif
</div>
<div class="pagination">
    {{$entries->links()}}
</div>

@endsection