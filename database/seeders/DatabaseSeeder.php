<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed 3 channels with 10 programmes each via their factories.
        Channel::factory()->has(
            Programme::factory()->count(10)
        )->count(3)->create();
    }
}
