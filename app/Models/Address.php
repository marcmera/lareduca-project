<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_road',
        'cp',
        'municipality',
        'province',
        'country'
    ];

    /**
     * Relationships
     */
    public function Student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
