<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Elquent\Relations\BelongsTo;

class Package extends Model
{
    protected $fillable = [
        'project_id',
        'name',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
