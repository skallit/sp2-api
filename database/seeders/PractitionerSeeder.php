<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Practitioner;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PractitionerSeeder extends Seeder
{
    use Truncatable,Seedfield;
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
