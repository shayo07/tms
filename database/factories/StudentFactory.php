<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'firstname' => fake()->name(),
            'term_id' => 4,
            'slug' => fake()->uuid()."".date('is'),
            'middlename' => fake()->name(),
            'lastname' => fake()->name(),
            'age' => fake()->numberBetween([14, 19]),
            'gender' => 'male',
            'parent_emailaddress' => fake()->unique()->safeEmail(),
            'home_address' => fake()->city(),
            'is_active' => 1,
            'created_by' => 1,
        ];
    }
}
