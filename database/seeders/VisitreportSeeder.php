<?php

namespace Database\Seeders;

use App\Models\Visit;
use App\Models\Visitreport;
use App\Models\Visitreportstate;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Seeder;

class VisitreportSeeder extends Seeder
{
    use Truncatable,Seedfield;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Visitreport::class);

        $reportState = Visitreportstate::firstWhere('name','done');
        foreach(Visit::done()->get() as $visit){
            $data = [
                'visit_id'=>$visit->id,
                'creationDate'=>$visit->attendedDate->clone()->addDays(random_int(1,3)),
                'comment'=>'texte',
                'starScore'=>random_int(1,5),
                'visitreportstate_id'=>$reportState->id
            ];
            Visitreport::create($data);
            //Medecines

        }
    }
}
