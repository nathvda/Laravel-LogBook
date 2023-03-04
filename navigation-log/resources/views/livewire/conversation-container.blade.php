<div wire:poll.3000ms>

    @if(count($user->conversations) == 0)

    No conversation.

    @else 

    @foreach($user->conversations as $conversation)

    <div class="conversation__unique">

    <a href="/conversation/{{$conversation->id}}">{{$conversation->name}}</a>

    @foreach($conversation->users as $user)

    <a href="/viewprofile/{{$user->id}}">{{$user->name}}</a>

    @endforeach
    </div>

    @endforeach

    @endif

</div>
