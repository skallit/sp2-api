<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Expensesheet;
use App\Models\Employee;

use Database\Factories\ExpensesheetFactory;

use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;

class ExpensesheetSeeder extends Seeder
{
    use Truncatable,Seedfield;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $actualYear = date("y");
        $beginingYear = $actualYear-1;

        $this->truncate(Expensesheet::class);

        $factory = new ExpenseSheetFactory();

        // Create all the month
        $months=[];
        for ($i=1;$i<=12;$i++){
            $months[]= $i;
        }

        // Create the year
        $years=[];
        for ($i=$beginingYear;$i<=$actualYear;$i++){
            $years[]=$i;
        }

        // Create the refs for the expenses sheets
        $refs=[];
        foreach ($years as $year){
            foreach($months as $month)
            {
                $firstDigits = ($month==12)?$year+1:$year;
                $lastDigits = $month+1;
                $lastDigits = ($lastDigits==13)?1:$lastDigits;
//              $lastDigits = fmod($month,12)+1;
                $zero=($month<9 || $month==12) ? '0':'';

                $data['ref']= (string)$firstDigits.(string)$zero.(string)$lastDigits;
                $data['date']='20'.$year.'-'.$zero.$month.'-28';
                $refs[]=$data;
            }
        }

        /** @var Employee $employee */
        foreach (Employee::all() as $employee) {
            foreach($refs as $ref){
                $expenseSheet=$factory->definition();
                $expenseSheet['employee_id']=$employee->id;
                $expenseSheet['sheetstate_id']=1;
                $expenseSheet['ref']=$ref['ref'];
                $expenseSheet['creationDate']=$ref['date'];
                Expensesheet::create($expenseSheet);
            }
        }
    }
}
