<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransmittalItem extends Model
{
    
    protected $fillable = [
        'transmittal_id',
        'mark_number',
        'mark_number',
        'material',
        'material_grade',
        'thickness',
        'quantity',
        'unit',
        'cutting_status',
        'cutting_date',
    ];

    public function transmittal() : BelongsTo
    {
        return $this->belongsTo(Transmittal::class);
    }
}
