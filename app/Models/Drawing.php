<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drawing extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'drawing_number',
        'drawing_title',
        'status',
        'remarks',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function revision(): HasMany
    {
        return $this->hasMany(DrawingRevision::class, 'drawing_id', 'id');
    }
}
