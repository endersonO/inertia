<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course' => $this->faker->text(20),
            'teacher' => $this->faker->name,
            'kindCurse' => $this->faker->text(10),
        ];
    }
}
