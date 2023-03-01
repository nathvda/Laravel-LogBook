@extends('app')
@section('title', $users->name .'\'s entries')
@section('content')

<a href="/" class="back">← Back</a>
<div class="entries__wrapper">
@foreach($users->entries as $entry)

<div class="entry__block">
        <h3>{{$entry->title}}</h3>
        <div class="infoblocks"><span class="date">Créé le : {{$entry->created_at}}</span>
        <span class="date">Modifié le : {{$entry->updated_at}}</span>
        <span class="date">Par : {{$entry->user->name}}</span></div>
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
</div>

@endsection