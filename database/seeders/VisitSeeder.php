<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Practitioner;
use App\Models\Visit;
use App\Models\Visitstate;
use Carbon\Carbon;
use Database\Seeders\Traits\Truncatable;
use Faker\Generator;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{

    use Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Visit::class);

        $states = Visitstate::all()->pluck('id','name');

        /** @var Practitioner $pratictionner */
        foreach (Practitioner::all() as $pratictionner) {
            if(rand(1,3)==2){
                $date = Carbon::createFromTimestamp(random_int(time()-315360000,time()-31536000));
                while($date<Carbon::now()->addYear(1)) {
                    $date->setTime(random_int(9,17),collect([00,15,30,45])->random());
                    //define state
                    $randomState = random_int(1,10);
                    if($date<Carbon::now()){
                        $state_id= $randomState == 5 ? $states['canceled'] : $states['done'];
                    }else{
                        $state_id= $randomState == 5 ? $states['postoned'] : $states['waiting'];
                    }
                    //define employee
                    $employee = $pratictionner->sectordistrict()->first()->employees()->active($date)->first();
                    if(null==$employee){
                        throw new \Exception('Aucun employé pour le secteurdistrict '.$pratictionner->sectordistrict()->first()->id.' le '.$date->format('Y-m-d') );
                    }
                    $visit = Visit::create([
                        'practitioner_id' => $pratictionner->id,
                        'employee_id' => $employee->id,
                        'attendedDate' => $date->format('Y-m-d H:00'),
                        'visitstate_id' => $state_id,
                    ]);
                    $timeAdd = rand(31104000,62208000);
                    $date->addSecond($timeAdd);
                }
            }
        }
    }
}
