<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;

class Notifications extends Component
{
    public $notifications;

    public $notification_id;

    protected $rules = [
        'notification_id' => 'required|numeric',
    ];

    public function mount(){
        $this->notifications = User::find(auth()->user()->id);
    }

    public function markRead($id){

        $this->notification_id = $id;
        
        Notification::where('id', $this->notification_id)->update([
            'read' => true
        ]);

    }


    public function render()
    {
        return view('livewire.notifications', ['notifications', $this->notifications]);
    }
}
