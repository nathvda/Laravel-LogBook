<div wire:poll.750ms class="messages__wrapper">
    {{-- The best athlete wants his opponent at his best. --}}
    @foreach($conversation->messages as $message)
        @if($message->user->id == auth()->user()->id)
        <div class="message message--yours"><div class=""><img class="avatar--messages" src="/images/{{$message->user->avatar}}"></div><div class="message__infos"><p>{{$message->content}}</p><span class="message__date">{{$message->created_at->diffForHumans()}}</span></div></div>
        @else
        <div class="message message--theirs"><div class=""><img class="avatar--messages" src="/images/{{$message->user->avatar}}"></div><div class="message__infos"><p>{{$message->content}}</p><span class="message__date">{{$message->created_at->diffForHumans()}}</span></div></div>
        @endif
    @endforeach
    <form wire:submit.prevent="sendMessage" id="message__send">
    <input placeholder="Enter your message" wire:model="content"/>
    </form>
</div>
