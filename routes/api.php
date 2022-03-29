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
    Route::get('user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('getPlannedVisit', [\App\Http\Controllers\API\VisitController::class, 'getPlannedVisit']);
    Route::get('getFinishedVisit', [\App\Http\Controllers\API\VisitController::class, 'getFinishedVisit']);
    Route::get('getMedecines', [\App\Http\Controllers\API\MedecineController::class, 'getMedecines']);
    Route::get('getVisitReport/{id}', [\App\Http\Controllers\API\VisitReportController::class, 'getVisitReport']);
    Route::post('visit/store', [\App\Http\Controllers\API\VisitController::class, 'createVisit']);
    Route::get('getVisitById/{id}', [\App\Http\Controllers\API\VisitController::class, 'getVisitById']);
    Route::delete('deleteVisit/{id}', [\App\Http\Controllers\API\VisitController::class, 'deleteVisit']);
    Route::get('getPractitioners', [\App\Http\Controllers\API\VisitController::class, 'getPractitioners']);
});
