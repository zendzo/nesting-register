<?php

namespace App\Models;

use Carbon\Carbon;
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
        'issued_date',
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

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    protected static function booted()
    {
        static::creating(function (Transmittal $transmittal) {
            if (empty($transmittal->transmittal_number)) {
                $transmittal->transmittal_number = self::generatedTransmittalNumber();
            }
            $transmittal->requested_by = auth()->id();
        });
    }

    private static function generatedTransmittalNumber(): string
    {
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->format('m');

        $lastTransmittal = self::query()
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->whereNotNull('transmittal_number')
            ->orderBy('created_at', 'desc')
            ->first();

        $nextNumber = 1; // Always initialize

        if ($lastTransmittal && ! empty($lastTransmittal->transmittal_number)) {
            $parts = explode('-', $lastTransmittal->transmittal_number);

            if (count($parts) === 5 && is_numeric($parts[4])) {
                $lastSequence = (int) $parts[4];
                $nextNumber = $lastSequence + 1;
            }
        }

        // ALWAYS return a valid string, even if no record found
        return sprintf('CNC-MEB-%04d-%02d-%04d', $currentYear, $currentMonth, $nextNumber);
    }
}
