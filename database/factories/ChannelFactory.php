<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Channel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->company,
            'icon' => $this->faker->imageUrl('640', '480', 'cats')
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    // public function configure()
    // {
    //     return $this->afterMaking(function (Channel $channel) {
    //         // $channel->saveMany(Programme::factory()->count(5)->create(['channel_id' => $channel->id]));

    //         // Programme::factory()->count(10)->create(['channel_id' => $channel->id]);
    //     })->afterCreating(function (Channel $channel) {
    //         // Programme::factory()->count(10)->create(['channel_id' => $channel->id]);
    //     });
    // }
}
