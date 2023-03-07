<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;
use App\Models\Notification;

class Like extends Component
{
    public $entry;
    public $entry_id;
    public $user_id;

    public function mount($entry){

        $this->entry = Entry::find($entry->id);
        
    }

    public function liked($user, $entry){
        $this->entry_id = $entry;
        $this->user_id = $user;

        if(\App\Models\Like::where('entry_id', $this->entry_id)->where('user_id', $this->user_id)->count() === 0)
        {
            \App\Models\Like::create([
                'entry_id' => $this->entry_id,
                'user_id' => $this->user_id
            ]);
    
            Notification::create([
                'user_id' => $this->entry->user_id,
                'from_user_id' => $this->user_id,
                'notificationtype_id' => 3
            ]);
        } else { 
                \App\Models\Like::where('entry_id', $this->entry_id)->where('user_id', $this->user_id)->delete();
            }
        

    }


    public function render()
    {
        return view('livewire.like', ['entry' => $this->entry]);
    }
}
