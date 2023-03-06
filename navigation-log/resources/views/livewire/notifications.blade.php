<div wire:poll.15000ms>
    @if(count($notifications->notifications) != 0)<button id="notification_toggle" class="notification">{{count($notifications->notifications)}}</button>
    <div class="notification__wrapper">
    @foreach($notifications->notifications as $notification)
    
    <div class="notification__individual @if($notifications->read == 0)unread @endif">
<a href="/viewprofile/{{$notification->author->id}}">{{$notification->author->name}}</a> {{$notification->type->message}}
<form wire:submit.prevent="markRead({{$notification->id}})">
    <button type="submit">Mark as read</button>
</form>
</div>
    @endforeach
    </div>
    @endif
</div>
