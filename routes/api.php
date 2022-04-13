<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [App\Http\Controllers\API\LoginController::class,'login'])->name('login');

Route::post('register', 'App\Http\Controllers\API\LoginController@register');

Route::middleware('auth:api')->group(function(){
    // Booking routes
    Route::get('employee', [\App\Http\Controllers\API\EmployeeController::class, 'employee']);
    Route::get('getPlannedVisit', [\App\Http\Controllers\API\VisitController::class, 'getPlannedVisit']);
    Route::get('getFinishedVisit', [\App\Http\Controllers\API\VisitController::class, 'getFinishedVisit']);
    Route::get('getMedecines', [\App\Http\Controllers\API\MedecineController::class, 'getMedecines']);
    Route::get('getVisitsByPractitioner/{id}', [\App\Http\Controllers\API\VisitController::class, 'getVisitsByPractitioner']);
    Route::get('getVisitReport/{id}', [\App\Http\Controllers\API\VisitReportController::class, 'getVisitReport']);
    Route::post('visit/store', [\App\Http\Controllers\API\VisitController::class, 'createVisit']);
    Route::post('practitioner/store', [\App\Http\Controllers\API\PractitionerController::class, 'createPractitioner']);
    Route::get('getVisitById/{id}', [\App\Http\Controllers\API\VisitController::class, 'getVisitById']);
    Route::get('getPractitionerById/{id}', [\App\Http\Controllers\API\PractitionerController::class, 'getPractitionerById']);
    Route::put('cancelVisit/{visit}', [\App\Http\Controllers\API\VisitController::class, 'cancelVisit']);
    Route::get('getPractitioners', [\App\Http\Controllers\API\PractitionerController::class, 'getPractitioners']);
    Route::get('showProfile/{id}', [\App\Http\Controllers\API\EmployeeController::class, 'showProfile']);
    Route::post('editAvatarProfile', [\App\Http\Controllers\API\EmployeeController::class, 'editAvatarProfile']);
    //Expense
    Route::get('getExpensePackageTypes',[\App\Http\Controllers\API\ExpensePackageTypeController::class,'getExpensePackageTypes']);
    Route::post('postExpensePackageType/{id}',[\App\Http\Controllers\API\ExpensePackageTypeController::class,'postExpensePackageType']);


    //logout
    Route::post('logout', [\App\Http\Controllers\API\LoginController::class, 'logout']);
});
