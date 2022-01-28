<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "category_id" => $this->faker->numberBetween(1, 10),
            "name" => $this->faker->name,
            "text" => $this->faker->paragraph(50),
            "slug" => $this->faker->slug,
        ];
    }
}
