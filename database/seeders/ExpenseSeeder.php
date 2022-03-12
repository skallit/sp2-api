<?php

namespace Database\Seeders;

use Database\Seeders\Traits\Truncatable;

use App\Models\Expense;
use App\Models\Expensesheet;
use App\Models\Expenseinpackage;
use App\Models\Expenseoutpackage;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    use Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Expenseinpackage::class);
        $this->truncate(Expenseoutpackage::class);
        $this->truncate(Expense::class);

        // First, get all the expense sheets
        $expenseSheets = Expensesheet::all();

        // Create some new expense lines for each sheet
        foreach ($expenseSheets as $expenseSheet){
            // Create expenses 
            for ($i=0;$i<=random_int(2,10);$i++){
                $expense=[
                    'expensesheets_id' => $expenseSheet->id,
                    'expensestates_id' => 1,
                    'quantity' => random_int(2,10),
                    'creationDate' => $expenseSheet->creationDate
                ];
                $expenseStored=Expense::create($expense);  

                if ($r=random_int(0,10)<5){
                    // This expense is in the packages
                    $expenseInPackage=[
                        'id' => $expenseStored->id,
                        'expensepackagetype_id' => random_int(1,4),
                    ];
                    Expenseinpackage::create($expenseInPackage);
                }
                else {
                    // This expense is out of the packages
                    $descriptions=[
                        "Achat de fournitures",
                        "Réservation d'une salle de conférence",
                        "Repas avec un spécialiste"
                    ];

                    $randomDescriptionKey=array_rand($descriptions,1);
                    $expenseOutPackage=[
                        'id' => $expenseStored->id,
                        'description' => $descriptions[$randomDescriptionKey],
                        'amount' => random_int(200,5000)/10, // to make a decimal we divided by 10
                        'unit' => '€',
                    ];
                    Expenseoutpackage::create($expenseOutPackage);
                    // Force de expense quanity to be 1
                    $expenseStored->quantity  = 1;
                    $expenseStored->save();

                }
            }
        }
    }
}
