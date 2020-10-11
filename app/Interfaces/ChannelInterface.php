<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

interface ChannelInterface {

    public function all(): Cache;

    public function timetable($channel, $date, $timezone): Collection;

    public function programme($channel, $programme): Collection;
}