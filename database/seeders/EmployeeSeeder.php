<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Sector;
use App\Models\Sectordistrict;
use Carbon\Carbon;
use Database\Factories\EmployeeFactory;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    use Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Employee::class);
        $factory = new EmployeeFactory();
        $startDate = Carbon::createFromDate(2001,1,1);
        $now = Carbon::now();
        /** @var Sector $sector */
        foreach(Sector::all() as $sector) {
            $data = $factory->definition();
            $data['sectordistrict_id']=$sector->districts()->inRandomOrder()->first()->id;
            $data['releaseDate']=null;
            $leader = Employee::create($data);
            $sector->leader_id=$leader->id;
            $sector->save();
            foreach($sector->districts as $sectordistrict){
                $date = $startDate->clone();
                while($date<$now and null!=$date){
                    $data = $factory->definition();
                    $data['sectordistrict_id']=$sectordistrict->id;
                    $data['entryDate']=$date->format('Y-m-d');
                    if(random_int(1,5)==3){
                        $date->addDays(random_int(100,3500));
                        $data['releaseDate']= $date->format('Y-m-d');
                    }else{
                        $date =null;
                        $data['releaseDate']=null;
                    }
                    $data['leader_id']=$leader->id;
                    Employee::create($data);
                }
            }
        }
        // Force the fisrt employee to be usersio/pwio
        $employee=Employee::find(1);
        $employee->firstname ='User';
        $employee->lastname = 'Sio';
        $employee->email='visiteur01@safi.com';
        $employee->save();
    }
}
