<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drawing extends Model
{
    protected $fillable = [
        'drawing_number',
        'drawing_title',
        'status',
        'remarks'
    ];

    public function revision(): HasMany
    {
        return $this->hasMany(DrawingRevision::class, 'drawing_id', 'id');
    }
}
