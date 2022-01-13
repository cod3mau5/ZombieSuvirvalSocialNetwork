<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurvivorsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TradesController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('survivors')->group(function () {
    Route::get('/', [SurvivorsController::class,'index'])->name('survivors.list');
    Route::get('/{id}', [SurvivorsController::class,'show'])->name('show')->where(['id' => '[0-9]+']);
    Route::post('/',[SurvivorsController::class,'store'])->name('survivors.store');
    Route::put('/{id}',[SurvivorsController::class,'update'])->name('survivors.update');
    Route::put('sendReport/{reporter}/{reported}',[SurvivorsController::class,'reportSurvivor'])->name('suvirvor.report');
    Route::delete('/{id}',[SurvivorsController::class,'destroy'])->name('survivors.destroy');

});
Route::prefix('reports')->group(function (){
    Route::get('/infectedSurvivors/', [ReportsController::class, 'infectedSurvivors'])->name('infectedSurvivors');
    Route::get('/notInfectedSurvivors/', [ReportsController::class, 'notInfectedSurvivors'])->name('notInfectedSurvivors');
    Route::get('/averageItems/', [ReportsController::class, 'averageItems'])->name('average.items');
    Route::get('/pointsLost/{id}', [ReportsController::class, 'pointsLost'])->name('pointsLost');
});
Route::prefix('trades')->group(function (){
    Route::put('/exchange/{survivorSend}/{survivorReceive}', [TradesController::class,'exchange'])->name('exchange');
});

