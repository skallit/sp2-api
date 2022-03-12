<?php

namespace Database\Seeders;

use App\Models\Activitystate;
use App\Models\Application;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    use Truncatable,Seedfield;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(Application::class,['SafiVisits','SafiFees','SafiRepay']);
    }
}
