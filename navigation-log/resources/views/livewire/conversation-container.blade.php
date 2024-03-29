<div wire:poll.3000ms class="conversation__wrapper">

    @if(count($user->conversations) == 0)

    No conversation.
    <a class="button__main" href="/new/conversation">Start a new conversation.</a>

    @else 

    @foreach($user->conversations as $conversation)

    <div class="conversation__unique">

    <a class="conversation__title" href="/conversation/{{$conversation->id}}">{{$conversation->name}}</a>

    <div class="conversation_users">@foreach($conversation->users as $user)

    <a href="/viewprofile/{{$user->id}}">{{$user->name}}</a>
    @endforeach
    </div>

    <form method="post" action="/leave/{{$conversation->id}}">
        @csrf
        @method('delete')
        <input style="display:none" name="user_id" value="{{auth()->user()->id}}"/>
        <input style="display:none" name="conversation_id" value="{{$conversation->id}}"/>
        <button class="button__main" type="submit">Leave conversation</button>
    </form>
    </div>

    @endforeach

    @endif

</div>
