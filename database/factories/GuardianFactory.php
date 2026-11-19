<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
   { 
    return [ 
        'name'         => fake()->name(), 
        'relationship' => fake()->randomElement(['Father', 'Mother', 'Guardian']), 
        'phone'        => fake()->numerify('01#-#######'), 
    ]; 
    } 

}
