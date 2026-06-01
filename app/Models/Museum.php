<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Museum extends Model
{
    protected $fillable = [
        'name',
    ];

    public function exhibitions(): HasMany
    {
        return $this->hasMany(Exhibition::class);
    }
}
