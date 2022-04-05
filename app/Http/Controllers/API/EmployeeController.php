<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public $successStatus = 200;

    public function showProfile($id)
    {
        $employee = Employee::where("id", $id)
            ->first();

        return $employee;
    }
}
