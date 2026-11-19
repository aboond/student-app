<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
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
            'name'          => fake()->name(), 
            'email'         => fake()->unique()->safeEmail(), 
            'phone'         => fake()->numerify('01#-#######'), 
            'date_of_birth' => fake()->date('Y-m-d', '2018-12-31'), 
            'class_name'    => fake()->randomElement(['1 Amanah', '1 Bestari', '2 Cemerlang']), 
            'status'        => 'active', 
        ]; 
    } 
}
