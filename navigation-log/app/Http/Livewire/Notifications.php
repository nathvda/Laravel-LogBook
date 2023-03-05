<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;


    public function mount(){
        $this->notifications = User::find(auth()->user()->id);
    }


    public function render()
    {
        return view('livewire.notifications', ['notifications', $this->notifications]);
    }
}
