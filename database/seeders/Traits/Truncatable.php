<?php


namespace Database\Seeders\Traits;


use Illuminate\Support\Facades\DB;

trait Truncatable
{
    public function truncate($class,$foreignKeyCheck=false)
    {
        if(!$foreignKeyCheck) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $class::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }else{
            $class::truncate();
        }
    }

}
