@extends('app')
@section('title', 'show a location\'s log')
@section('content')

<a href="/" class="back">← Back</a>
<div class="entries__wrapper">
@foreach($locations->entries as $entry)

    <div class="entry__block">
        <h3>{{$entry->location->location}}</h3>
        <a class="tag__location" href="/location/show/{{$entry->location->id}}">#{{$entry->location->location}}</a>
        <span class="date">Créé le : {{$entry->created_at}}</span>
        <span class="date">Modifié le : {{$entry->updated_at}}</span>
        <p>{{$entry->entry}}</p>
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