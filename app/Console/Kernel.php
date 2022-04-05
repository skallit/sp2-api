<?php

namespace App\Console;

use App\Models\Employee;
use App\Models\Expensepackagetype;
use App\Models\Expensesheet;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (){
            $Employees = Employee::all();
            foreach ($Employees as $employee){
                $expenseSheet['employee_id']=$employee->id;
                $expenseSheet['sheetstate_id']=1;
                $expenseSheet['creationDate']=Carbon::now()->addMonth()->format('Y-m-d');
                $expenseSheet['unit']='€';
                $date =Carbon::now()->format('Y-m-d');
                $date[6] =$date[6]+1;
                if($date[5]==1 && $date[6]!=3){
                    $ref = $date[2].$date[3].$date[5].$date[6];
                }
                elseif($date[5]==1 && $date[6]==3){
                    $ref = $date[2].$date[3].'0'.($date[6]-1);
                }
                else{
                    $ref = $date[2].$date[3].'0'.$date[6];
                }
                $expenseSheet['ref']=$ref;
                Expensesheet::create($expenseSheet);
            }
        })->monthlyOn(28, '00:00')->timezone('Europe/Paris')->evenInMaintenanceMode();
        $schedule->call(function(){
            $expenseSheets = Expensesheet::all();
            foreach ($expenseSheets as $expenseSheet){
                $date =Carbon::now()->subMonth()->format('Y-m'.'-28');
                Expensesheet::where('creationDate',$date)->update(['sheetstate_id'=>2]);
            }
        })->monthlyOn(10, '00:00')->timezone('Europe/Paris')->evenInMaintenanceMode();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
