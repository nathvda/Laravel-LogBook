<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;

class ConversationMessages extends Component
{
    public $conversation;
    public $user_id;
    public $content;
    public $conversation_id;

    protected $rules = [
        'user_id' => 'required|numeric',
        'conversation_id' => 'required|numeric',
        'content'=> 'required'
    ];

    public function mount($id)
    {
        $this->conversation = Conversation::find($id);
        $this->conversation_id = $this->conversation->id;
        $this->user_id = auth()->user()->id;
    }

    public function sendMessage()
    {

        $this->validate();

        Message::Create([
            'user_id' => $this->user_id,
            'conversation_id' => $this->conversation_id,
            'content' => $this->content
        ]);

        $this->content = '';
    }
    
    public function render()
    {
        return view('livewire.conversation-messages', ['conversation' => $this->conversation]);
    }
}
