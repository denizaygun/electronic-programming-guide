<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programme extends Model
{
    use HasFactory;

    public $incrementing = false; // Prevents from casting the ID into an INT.

    /**
     * A programme belongs to a channel.
     * 
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * Local scope for constraining by a channel UUID.
     * 
     * @return Builder
     */
    public function scopeByChannel($query, string $channel): Builder
    {
        return $query->where('channel_id', $channel);
    }

    /**
     * Local scope for constraining timetables that match a date.
     * 
     * @param mixed $query
     * @param string $date
     * @param string $timezone
     * 
     * @return Builder
     */
    public function scopeByDate($query, string $date, string $timezone): Builder
    {
        $parsedDate = Carbon::parse($date, $timezone);
        $parsedDate->setTimezone('UTC');

        return $query->where('started_at', '<=', $parsedDate)->where('ended_at', '>=', $parsedDate);
    }
}
