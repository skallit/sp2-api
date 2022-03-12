<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpensesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $creationDate = $this->faker->dateTimeBetween('-1 years','+1 months')->format('Y-m-d');
        
        
        return [
            'calculatedAmount'=>0,
            'unit'=>'€'
        ];
    }
}
