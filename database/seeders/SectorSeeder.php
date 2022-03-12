<?php

namespace Database\Seeders;

use App\Models\Sector;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(Sector::class,['Centre','Nord-Ouest','Nord-Est','Sud-Ouest','Sud-Est','DTOM Caraïbes-Amériques','DTOM Asie-Afrique']);
    }
}
