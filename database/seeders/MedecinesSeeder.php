<?php

namespace Database\Seeders;

use App\Models\Medecine;
use Database\Seeders\Traits\FromCSV;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedecinesSeeder extends Seeder
{
    use FromCSV,Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fromCSV(Medecine::class,base_path().'/database/seeders/data/medecines.csv',';');
    }
}
