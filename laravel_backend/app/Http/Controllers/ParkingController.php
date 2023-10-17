<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ParkingController extends Controller
{

    public function index(){
     return view('parking')->with([]);
    }

    public function TodosRegistros(){
        $data = parking::all();
        return response( )->json( array( "data" => $data), 200 );
    }



    public function GuardarRegistro(Request $request)
    {
        $parking = new parking();
        $parking->vehiculo_placa = $request->placa;
        $parking->conductor_nombre = $request->nombre;

        // $parking->salida = $dateformat->format('Y-m-d H:i:s');
         $parking->entrada = Carbon::now()->toDateTimeString();
        $parking->save();
        $parking::find($parking->id);
        return response( )->json( array( "parking" => $parking), 200 );
    }

    Public function EliminarRegistro(Request $request){
        $Eliminar = parking::find($request->id);
        $Eliminar->delete();
        $Eliminar = 'ok';
        return response( )->json( array( "Eliminar" => $Eliminar), 200 );
    }
    Public function VerRegistro(Request $request){
        $ver_dato = parking::find($request->id);
        return response( )->json( array( "ver_dato" => $ver_dato), 200 );
    }
    public function ModalDatos(Request $request){
        return view('Modal.ModalverDatos')->with([
        ]);
    }
    public function ModalDatos_update(Request $request){
        return view('Modal.ModalverDatosUpdate')->with([
        ]);
    }
    Public function ActualizarRegistro(Request $request){
        $datos_update = parking::find($request->id);
        $datos_update->vehiculo_placa = $request->placa;
        $datos_update->conductor_nombre = $request->nombre;
        $datos_update->save();
        return response( )->json( array( "datos_update" => $datos_update), 200 );
    }
    public function ModalPagar(Request $request){
        return view('Modal.ModalPagar')->with([
        ]);
    }

    public  function TotalPagar(Request $request){
        $ver_dato = DB::select( DB::raw("SELECT id, vehiculo_placa, conductor_nombre, entrada, NOW() as salidatos,
CONCAT( TIMESTAMPDIFF(HOUR, entrada, NOW()),' hora ',TIMESTAMPDIFF(MINUTE, entrada, NOW()) % 60 ,' minutos')AS formato_horas,
CONCAT('$ ',FORMAT('1.00' * CEILING(TIMESTAMPDIFF(Minute, entrada, NOW())/60.0),2)) as Total
FROM parking where parking.id = :variable"), array('variable' => $request->id));
        return response( )->json( array( "ver_dato" => $ver_dato), 200 );
    }

    Public function ActualizarPago(Request $request){
        $datos_update = parking::find($request->id);
        $datos_update->salida = $request->salida;
        $datos_update->total = $request->total;
        $datos_update->formato_horas = $request->formato_horas;
        $datos_update->save();
        return response( )->json( array( "datos_update" => $datos_update), 200 );
    }



}
