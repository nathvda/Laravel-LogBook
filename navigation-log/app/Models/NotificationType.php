<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NotificationType extends Model
{
    use HasFactory;

    protected $table = 'notificationtype';

    protected $fillable = [
        'type',
        'message'
    ];

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'notificationtype_id', 'id');
    }
}
