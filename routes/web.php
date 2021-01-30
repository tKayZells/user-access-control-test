<?php

use App\Http\Middleware\EnsureUserCanAccess;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("/403", function() {
    return view("403");
})->name("403");

Route::middleware(['access'])->group(function () {
    
    Route::get('/route_1', function ($id) {
        return view('welcome');
    });

    Route::get('/route_2', function () {
        return view('welcome');
    });

    Route::get('/route_3', function () {
        return view('welcome');
    });

    Route::get('/route_4', function () {
        return view('welcome');
    });
});