<?php

namespace Database\Factories;

use App\Models\Sectordistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practitionner>
 */
class PractitionerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastname'=>$this->faker->lastName,
            'firstname'=>$this->faker->firstName,
            'address'=>$this->faker->address,
            'email'=>$this->faker->email,
            'website'=>$this->faker->url,
            'tel'=>$this->faker->phoneNumber,
            'meeting_online'=>$this->faker->randomElement(['Oui','Non']),
            'status'=>$this->faker->randomElement(['En exercice', 'Radié', 'En retraite', 'Décédé']),
            'notorietyCoeff'=>$this->faker->randomNumber(2),
            'complementarySpeciality'=>$this->faker->randomElement([null,null,'homéopathie','urgences','psychiatrie','pédiatrie','osthéopathie','médecine sportive','gérontologie','angéiologie','allergologie','acupuncture']),
            'sectordistrict_id'=>Sectordistrict::inRandomOrder()->first()->id
        ];
    }
}
