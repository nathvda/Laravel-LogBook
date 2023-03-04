<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ConversationContainer extends Component
{
    public $conversations;

    public function mount(){
        $this->conversations = User::find(auth()->user()->id);
    }

    public function updating(){
        $this->conversations = User::find(auth()->user()->id)->conversations;
    }

    public function render()
    {
        return view('livewire.conversation-container', ['user' => $this->conversations]);
    }
}
