<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Entry extends Model
{
    use HasFactory;

    protected $with = [
        'location',
        'user',
        'category'
    ];

    protected $table = 'entries';

    protected $fillable = [
        'entry',
        'title',
        'locations_id',
        'user_id'
    ];

    public function location() : BelongsTo
    {

        return $this->belongsTo(Location::class, 'locations_id');

    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() : BelongsToMany{

        return $this->belongsToMany(Category::class, 'entries_category','entry_id','category_id');

    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }
}
