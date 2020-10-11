<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Resources\ProgrammeResource;
use App\Http\Resources\TimetableCollection;
use Illuminate\Support\Collection;

interface ChannelInterface
{
    public function all(): Collection;

    public function getTimetable($channel, $date, $timezone): TimetableCollection;

    public function getProgramme($channel, $programme): ProgrammeResource;
}
