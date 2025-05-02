<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'abbr',
        'name',
        'email',
        'logo',
        'website',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
