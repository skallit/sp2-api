<?php

namespace Database\Seeders;

use App\Models\Visitreportstate;
use App\Models\Visitstate;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitreportstateSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(Visitreportstate::class,['waiting','done','adjusted']);
    }
}
