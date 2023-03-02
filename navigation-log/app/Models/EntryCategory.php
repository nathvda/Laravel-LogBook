<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EntryCategory extends Pivot
{
    use HasFactory;

    protected $table = 'entries_category';

    protected $fillable = [
        'entry_id',
        'category_id'
    ];
}
