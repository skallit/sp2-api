<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Expensesheet;
use Illuminate\Http\Request;

class ExpenseSheetsController extends Controller
{
    public $successStatus = 200;

    public function CreateExpenseSheet(){
        $ExpenseSheets = Expensesheet::all();
    }
}
