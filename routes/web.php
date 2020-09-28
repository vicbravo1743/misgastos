<?php

use Illuminate\Support\Facades\Route;
use App\Http\LiveWire\ShowUsers;
use App\Http\LiveWire\ShowFondos;
use App\Http\LiveWire\ShowGastos;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Gastos
Route::get('/usuarios', [ShowUsers::class, 'index']);
Route::get('/fondos', [ShowFondos::class, 'index']);
Route::get('/gastos', [ShowGastos::class, 'index']);
