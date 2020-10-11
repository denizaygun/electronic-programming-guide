<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ChannelRepository;
use \Illuminate\Http\JsonResponse;

class ChannelController extends Controller
{
    private $channelRepository;

    /**
     * Constructor which injects the channel repository. 
     * 
     * @param ChannelRepository $channelRepository
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    /**
     * List of all channels.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->channelRepository->all());
    }

    /**
     * Get the programme timetable for a channel by date and timezone.
     * 
     * @param string $channel UUID
     * @param string $date
     * @param string $timezone A valid PHP timezoneID
     * 
     * @return JsonResponse
     */
    public function getTimetable($channel, $date, $timezone): JsonResponse
    {
        return response()->json($this->channelRepository->getTimetable($channel, $date, $timezone));
    }

    /**
     * Get selected programme information.
     * 
     * @param $channel UUID
     * @param $programme UUID 
     *
     * @return JsonResponse
     */
    public function getProgramme($channel, $programme): JsonResponse
    {
        return response()->json($this->channelRepository->getProgramme($channel, $programme));
    }
}
