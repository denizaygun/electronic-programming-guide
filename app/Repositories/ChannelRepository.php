<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Resources\ProgrammeResource;
use App\Http\Resources\TimetableCollection;
use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ChannelRepository implements ChannelInterface
{

    /**
     * List of all channels via cache.
     * 
     * @return Collection
     */
    public function all(): Collection
    {
        return Cache::rememberForever('channels', function () {
            return Channel::select('id', 'name', 'icon')->get();
        });
    }

    /**
     * Programme timetable for a channel by date and timezone.
     * 
     * @param string $channel UUID
     * @param string $date
     * @param string $timezone A valid PHP timezoneID
     * 
     * @return TimetableCollection
     */
    public function getTimetable($channel, $date, $timezone): TimetableCollection
    {
        return new TimetableCollection(Programme::byChannel($channel)->byDate($date, $timezone)->get());
    }

    /**
     * Selected programme information.
     * 
     * @param $channel UUID
     * @param $programme UUID 
     *
     * @return ProgrammeResource
     */
    public function getProgramme($channel, $programme): ProgrammeResource
    {
        return new ProgrammeResource(Programme::with('channel:id,name,icon')->findOrFail($programme));
    }
}
