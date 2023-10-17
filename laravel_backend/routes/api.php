<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\parking;
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



Route::get('/TodosRegistros', function (Request $request) {
    $ver_dato = parking::all();
    return $ver_dato;
});

Route::post('/VerRegistro', function (Request $request) {
    $ver_dato = parking::find($request->input('id'));
    return $ver_dato;
});

//Route::post( '/GuardarRegistro', function (Request $request) {
//{
//    $parking = new parking();
//    $parking->vehiculo_placa = $request->placa;
//    $parking->conductor_nombre = $request->nombre;
//
//    // $parking->salida = $dateformat->format('Y-m-d H:i:s');
//    $parking->entrada = Carbon::now()->toDateTimeString();
//    $parking->save();
//    $parking::find($parking->id);
//    return response( )->json( array( "parking" => $parking), 200 );
//});
