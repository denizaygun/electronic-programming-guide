<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Timetable extends Model
{
    use HasFactory;

    /**
     * Local scope for constraining timetables that match a date.
     * 
     * @param $query
     * @param $date
     * 
     * @return Collection
     */
    public function scopeByDate($query, $date, $timezone): Collection {
        $parsedDate = Carbon::parse($date, $timezone);
        $parsedDate->setTimezone('UTC');

        return $query->where('started_at', '>=', $parsedDate)->where('ended_at', '<=', $parsedDate);
    }
}
