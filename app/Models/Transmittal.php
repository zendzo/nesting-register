<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transmittal extends Model
{

  protected $fillable = [
    'transmittal_number',
    'project_id',
    'drawing_id',
    'nesting_by',
    'requested_by',
    'nesting_type',
    'requested_date',
    'issued_date'
  ];

  public function project(): BelongsTo
  {
    return $this->belongsTo(Project::class);
  }

  public function drawing(): BelongsTo
  {
    return $this->belongsTo(Drawing::class);
  }

  public function transmittalItems(): HasMany
  {
    return $this->hasMany(TransmittalItem::class);
  }
  
  public function nestingBy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'nesting_by');
  }
}
