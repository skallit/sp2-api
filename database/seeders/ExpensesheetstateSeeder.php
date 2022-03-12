<?php

namespace Database\Seeders;

use App\Models\Expensesheetstate;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesheetstateSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(Expensesheetstate::class,['created','closed','validated','payment','reimbursed',' waiting for proof']);
    }
}
