<?php

namespace Database\Factories;

use App\Models\Todos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\todos>
 */
class todosFactory extends Factory
{
    protected $model = Todo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'completed' => false,
        ];
    }
}
