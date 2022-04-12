<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Expensepackagetype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensePackageTypeController extends Controller
{
    public $successStatus = 200;

    public function getExpensePackageTypes(){
        $expenseInPackages = Expensepackagetype::all();

        return $expenseInPackages;
    }

    public function postExpensePackageType(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $expenseInPackages = Expensepackagetype::where('id',$id)->update(['amount'=>$request['amount']]);
        return response()->json(['success' => $expenseInPackages], $this->successStatus);
    }
}
