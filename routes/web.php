<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
    return redirect('/login');
});


Route::post('/adminsCharts',[ProductController::class,'store'])->name('adminsCharts');
Route::get('/adminsCharts',[ProductController::class,'indexAdmins'])->middleware('auth','admin')->name('adminsCharts');

Route::patch('/adminsCharts/{id}',[ProductController::class,'update'])->name('adminsCharts-update');
Route::delete('/adminsCharts/{id}',[ProductController::class,'destroy'])->name('adminsCharts-delete');


Route::view('/login',"login")->name('login');
Route::view('/registro',"register")->name('registro');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/inicia-sesion',[LoginController::class,'login'])->name('inicia-sesion');
Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
Route::get('/charts',[ProductController::class,'index'])->middleware('auth')->name('charts');
