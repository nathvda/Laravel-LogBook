<div wire:poll.3000ms>
    @if(count($notifications->notifications) != 0)<div class="notification">{{count($notifications->notifications)}}</div>
    @endif
</div>
