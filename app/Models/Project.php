<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'project_code',
        'fabrication_location',
        'installation_location',
        'company_id',
        'contractor_id',
        'client_id',
        'description',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'contractor_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'client_id');
    }

    public function drawings(): HasMany
    {
        return $this->hasMany(Drawing::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
