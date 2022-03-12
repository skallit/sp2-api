<?php

namespace Database\Seeders;

use App\Models\Visitstate;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Seeder;

class VisitstateSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(VisitState::class,['waiting','done','postoned','canceled']);
    }
}
