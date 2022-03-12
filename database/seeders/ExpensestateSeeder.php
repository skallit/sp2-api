<?php

namespace Database\Seeders;

use App\Models\Expensestate;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensestateSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create(Expensestate::class,['waiting_for_validation','waiting_for_proof','validated','refused_for_missing_proof','refused_for_amount_too_high']);
    }
}
