<?php


namespace Database\Seeders\Traits;


use Illuminate\Support\Facades\DB;

trait FromCSV
{
    public function fromCSV($class,$file,$separator=',')
    {
        $this->truncate($class);
        $rows = explode(PHP_EOL,file_get_contents($file));
        $firstRow = collect(explode($separator,$rows[0]))->map(function($item){
            if(substr($item,0,1)=='"'){
                $item=substr($item,1);
            }
            if(substr($item,-1)=='"'){
                $item=substr($item,0,-1);
            }
            return $item;
        })->flip();
        unset($rows[0]);
        foreach($rows as $row){
            if(trim($row)<>'') {
                $data = [];
                $csv = str_getcsv($row, $separator);
                foreach ($firstRow as $columnName => $columnIndex) {
                    $data[$columnName] = $csv[$columnIndex];
                }
                $class::create($data);
            }
        }

    }

}
