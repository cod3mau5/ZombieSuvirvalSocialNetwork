<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| We list the survivors
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
