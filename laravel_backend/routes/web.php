<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;

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




Route::get('/', [ ParkingController::class, 'index' ])->name('/');
Route::get('TodosRegistros', [ ParkingController::class, 'TodosRegistros' ])->name('TodosRegistros');
Route::post('GuardarRegistro', [ ParkingController::class, 'GuardarRegistro' ])->name('GuardarRegistro');
Route::post('EliminarRegistro', [ ParkingController::class, 'EliminarRegistro' ])->name('EliminarRegistro');
Route::post('VerRegistro', [ ParkingController::class, 'VerRegistro' ])->name('VerRegistro');
Route::get('ModalDatos', [ ParkingController::class, 'ModalDatos' ])->name('ModalDatos');
Route::get('ModalDatos_update', [ ParkingController::class, 'ModalDatos_update' ])->name('ModalDatos_update');
Route::post('ActualizarRegistro', [ ParkingController::class, 'ActualizarRegistro' ])->name('ActualizarRegistro');


Route::get('ModalPagar', [ ParkingController::class, 'ModalPagar' ])->name('ModalPagar');
Route::post('TotalPagar', [ ParkingController::class, 'TotalPagar' ])->name('TotalPagar');
Route::post('ActualizarPago', [ ParkingController::class, 'ActualizarPago' ])->name('ActualizarPago');
// Route::apiResource('TodosRegistros', ParkingController::class);
