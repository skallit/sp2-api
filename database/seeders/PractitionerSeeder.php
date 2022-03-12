<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Practitioner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PractitionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Practitioner::factory(random_int(400,600))->create();
    }
}
