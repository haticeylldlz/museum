<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exhibition extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'museum_id',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function museum(): BelongsTo
    {
        return $this->belongsTo(Museum::class);
    }
}
