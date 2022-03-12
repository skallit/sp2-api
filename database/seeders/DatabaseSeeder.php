<?php

namespace Database\Seeders;

use App\Models\Expensepackagetype;
use App\Models\Expenseprooftype;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            SectorSeeder::class,
            SectordistrictSeeder::class,
            VisitstateSeeder::class,
            VisitreportstateSeeder::class,
            ApplicationSeeder::class,
            ExpensepackagetypeSeeder::class,
            ExpenseprooftypeSeeder::class,
            ExpensesheetstateSeeder::class,
            ExpensestateSeeder::class,
            PrivilegesSeeder::class,
            EmployeeSeeder::class,
            ExpensesheetSeeder::class,
            ExpenseSeeder::class,
            PractitionerSeeder::class,
            MedecinesSeeder::class,
            VisitSeeder::class,
            VisitreportSeeder::class,
        ]);
    }
}
