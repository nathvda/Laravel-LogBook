<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Location;

class Entry extends Model
{
    use HasFactory;

    protected $table = 'entries';

    protected $fillable = [
        'entry',
        'title',
        'locations_id'
    ];

    public function location() : BelongsTo
    {

        return $this->belongsTo(Location::class, 'locations_id');

    }
}
