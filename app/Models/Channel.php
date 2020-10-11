<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory;

    public $incrementing = false; // Prevents from casting the ID into an INT.

    /**
     * A channel has many programmes.
     * 
     * @return HasMany
     */
    public function programmes(): HasMany
    {
        return $this->hasMany(Programme::class);
    }
}
