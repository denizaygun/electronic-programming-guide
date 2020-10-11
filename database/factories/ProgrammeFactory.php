<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'channel_id' => function () {
                return Channel::factory()->create()->id;
            },
            'name' => $this->faker->catchPhrase,
            'description' => $this->faker->text,
            'thumbnail' => $this->faker->imageUrl('640', '480', 'city'),
            'started_at' => $this->faker->dateTimeBetween('-2 hours', 'now', 'UTC'),
            'ended_at' => $this->faker->dateTimeBetween('+30 minutes', '+2 hours', 'UTC'),
            'duration' => $this->faker->numberBetween(1800, 14400) // Duration in seconds, ranging from 30 mins to 4 hours
        ];
    }
}
