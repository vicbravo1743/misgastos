<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Gastos
Route::get('/usuarios', [App\Http\Livewire\ShowUsers::class, 'index']);
Route::get('/fondos', [App\Http\Livewire\ShowFondos::class, 'index']);
Route::get('/gastos', [App\Http\Livewire\ShowGastos::class, 'index']);
