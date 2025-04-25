<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingRevision extends Model
{
    protected $fillable = [
        'drawing_id',
        'revision_number',
        'revision_title',
        'revision_date',
        'remarks'
    ];

    public function drawing()
    {
        return $this->belongsTo(Drawing::class, 'drawing_id', 'id');
    }
}
