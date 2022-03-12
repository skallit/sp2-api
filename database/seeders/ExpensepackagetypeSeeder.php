<?php

namespace Database\Seeders;

use App\Models\Expensepackagetype;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensepackagetypeSeeder extends Seeder
{

    use Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Expensepackagetype::class);
        Expensepackagetype::create(['name'=>'Repas de midi','amount'=>25,'unit'=>'€']);
        Expensepackagetype::create(['name'=>'Relais étape (nuit+repas)','amount'=>100,'unit'=>'€']);
        Expensepackagetype::create(['name'=>'Nuitée (hôtel seul)','amount'=>80,'unit'=>'€']);
        Expensepackagetype::create(['name'=>'Déplacement : prix remboursé au kilomètre. Chaque visiteur dispose d\'un badge pour le télépéage pour éviter le remboursement de ces petits montants.','amount'=>0.45,'unit'=>'€']);
    }
}
