<?php

namespace Tests\Feature;

use App\Models\Channel;
use App\Models\Programme;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(); // Seeds the database

        $this->channelId = Channel::first()->id;
        $this->programmeId = Programme::first()->id;
    }

    /**
     * A basic feature for testing access to channels endpoint.
     *
     * @return void
     */
    public function testCanAccessChannels()
    {
        $channels = $this->json('GET', '/api/channels')->assertStatus(200)->json();

        $this->assertIsArray($channels);
    }

    /**
     * A basic feature for testing access to timetable endpoint.
     *
     * @return void
     */
    public function testCanAccessChannelTimetable()
    {
        $dateTime = Carbon::now()->toDateTimeString();

        $timetable = $this->json('GET', "api/channels/{$this->channelId}/{$dateTime}/timezone/UTC")->assertStatus(200)->json();

        $this->assertIsArray($timetable);
    }

    /**
     * A basic feature for testing access to timetable endpoint.
     *
     * @return void
     */
    public function testCanAccessChannelProgramme()
    {
        $timetable = $this->json('GET', "api/channels/{$this->channelId}/programmes/{$this->programmeId}")->assertStatus(200)->json();

        $this->assertIsArray($timetable);
    }
}
