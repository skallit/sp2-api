<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Expensesheet;
use Illuminate\Http\Request;

class ExpenseSheetsController extends Controller
{
    public $successStatus = 200;

    public function getExpenseSheetClosed(){
        $expenseSheet= Expensesheet::where('sheetstate_id',2)->get();

        return $expenseSheet;
    }

}
