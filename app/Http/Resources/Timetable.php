<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Automatically applied when a TimetableCollection is used.
 */
class Timetable extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'duration' => $this->duration,
        ];
    }
}
