<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversations';

    protected $fillable = [
        'name'
    ];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_conversation', 'conversation_id', 'user_id');
    }

    public function messages() : HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }
}
