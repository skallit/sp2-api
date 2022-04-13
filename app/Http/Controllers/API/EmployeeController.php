<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $successStatus = 200;

    public function employee()
    {
        $employees = Employee::with('employee')
            ->get();

        return $employees;
    }

    public function showProfile($id)
    {
        $employee = Employee::where("id", $id)
            ->first();

        return $employee;
    }

    public function editAvatarProfile(Employee $employee, Request $request)
    {
        $data = $request->all([
            'avatar'
        ]);
        $avatarEmployee = Employee::find($data['avatar'])->update();
        return $avatarEmployee;
    }
}
