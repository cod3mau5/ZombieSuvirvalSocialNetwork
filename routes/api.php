<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuvirvorsController;


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
Route::get('/suvirvors',[SuvirvorsController::class,'index'])->name('suvirvors.list');
Route::post('/suvirvors',[SuvirvorsController::class,'store'])->name('suvirvors.store');
Route::put('/suvirvors/{id}',[SuvirvorsController::class,'update'])->name('suvirvors.update');
Route::delete('/suvirvors/{id}',[SuvirvorsController::class,'destroy'])->name('suvirvors.destroy');
