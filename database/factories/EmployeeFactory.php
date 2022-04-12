<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Sectordistrict;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstname=$this->faker->firstName;
        $lastname=$this->faker->lastName;
        $entryDate = $this->faker->dateTimeBetween('-20 years','-2 months')->format('Y-m-d');
        $interval = time() - strtotime($entryDate);
        $releaseDate = random_int(1,10)==5 ? strtotime($entryDate)+random_int(2592000,$interval) : null;
        if(null!==$releaseDate){
            $releaseDate = date('Y-m-d',$releaseDate);
        }
        $leader = Employee::all()->count()<10 ? null :Employee::inRandomOrder()->first();
        return [
            'code'=>$this->faker->randomElement(['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']).$this->faker->randomNumber(3),
            'leader_id'=>$leader==null ? null : $leader->id,
            'sectordistrict_id'=>$leader==null ? Sectordistrict::inRandomOrder()->first()->id : $leader->sectordistrict->id,
            'postalCode'=>$this->faker->postcode,
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'avatar'=>$this->faker->imageUrl(512,512),
            'email'=> Str::slug($lastname).'.'.Str::slug(Str::between($firstname,0,1)).'@safi.com',
            'password'=>Hash::make('pwsio'),
            'address'=>$this->faker->address,
            'city'=>$this->faker->city,
            'phone'=>$this->faker->phoneNumber,
            'releaseDate'=>$releaseDate,
            'entryDate'=>$entryDate
        ];
    }
}
