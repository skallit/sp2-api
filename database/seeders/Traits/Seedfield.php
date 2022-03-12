<?php


namespace Database\Seeders\Traits;


use Illuminate\Support\Facades\DB;

trait Seedfield
{
    public function create($class,$data,$field='name')
    {
        $this->truncate($class);
        foreach($data as $name){
            $class::create([$field=>$name]);
        }

    }

}
