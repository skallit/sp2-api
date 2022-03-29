<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Expensepackagetype;
use Illuminate\Http\Request;

class ExpensePackageTypeController extends Controller
{
    public $successStatus = 200;

    public function getExpensePackageType(){
        $expenseInPackages = Expensepackagetype::all();
        return $expenseInPackages;
    }
}
