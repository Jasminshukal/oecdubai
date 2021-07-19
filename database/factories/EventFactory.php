<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\events;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->unique()->safeEmail(),
            'image' => Str::random(10).".jpg",
            'date' => $this->faker->date('Y-m-d',now()),

        ];
    }
}
