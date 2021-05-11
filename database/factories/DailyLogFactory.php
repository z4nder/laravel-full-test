<?php

namespace Database\Factories;

use App\Models\DailyLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailyLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DailyLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'log' => $this->faker->name,
            'day' => now(),
        ];
    }
}
