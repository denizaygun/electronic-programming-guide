<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ChannelRepository implements ChannelInterface {

    /**
     * List of all channels via cache.
     * 
     * @return Cache
     */
    public function all(): Cache {
        return Cache::get('channels', function () {
            return Channel::all();
        });
    }

    /**
     * Programme timetable for a channel by date and timezone.
     * 
     * @param string $channel UUID
     * @param string $date
     * @param string $timezone A valid PHP timezoneID
     * 
     * @return Collection
     */
    public function timetable($channel, $date, $timezone): Collection {
        return Channel::with(['timetable' => function ($query) use ($date, $timezone) {
            $query->byDate($date, $timezone);
        }])->findOrFail($channel);
    }

    /**
     * Selected programme information.
     * 
     * @param $channel UUID
     * @param $programme UUID 
     *
     * @return Collection
     */
    public function programme($channel, $programme): Collection {
        return Programme::with('channel')->findOrFail($programme);
    }
}