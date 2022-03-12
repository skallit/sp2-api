<?php

namespace Database\Seeders;

use App\Models\Expenseprooftype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseprooftypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expenseprooftype::create(['type'=>'phone_camera','extension'=>'jpg']);
        Expenseprooftype::create(['type'=>'computer','extension'=>'jpg']);
    }
}
