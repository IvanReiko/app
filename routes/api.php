<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\WorkProcessController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'employee'], function () {
    Route::get('', [EmployeeController::class, 'index']);
    Route::get('/{employee}', [EmployeeController::class, 'show']);
    Route::get('/history/{employee}', [EmployeeController::class, 'getEmployeeHistory']);
});

Route::group(['prefix' => 'machine'], function () {
    Route::get('', [MachineController::class, 'index']);
    Route::get('/{machine}', [MachineController::class, 'show']);
    Route::get('history/{machine}', [MachineController::class, 'getMachineHistory']);
});

Route::post('/assign/{employee}/{machine}', [WorkProcessController::class, 'assign']);
Route::post('/unassign/{employee}/{machine}', [WorkProcessController::class, 'unassign']);

