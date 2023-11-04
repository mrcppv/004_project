<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!



Route::get('/', function () {
    return view('welcome');
});

Route::resource("/userData", "App\Http\Controllers\UserDataController");

*/

Route::get('/user/{id}', function ($id) {
    return 'id number is = ' . $id;
});

Route::get('/', function () {
    return redirect("/Project");
});

Route::resource("/Project", "App\Http\Controllers\ProjectController");


//routing with controllers
/*

Route::controller(OrderController::class)->group( function(){
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});

*/
