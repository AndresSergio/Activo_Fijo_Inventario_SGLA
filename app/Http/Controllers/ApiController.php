<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    //

    function agregar(Request $request){

        $usuario = new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=$request->password;
        $resultado = $usuario->save();
        if($resultado){
            return "ok insert";
        }
        else{
            return "error insert";
        }

    }

    function buscar(){
        $almacen = DB::table('almacen_activo_af')->get();
        $item = DB::table('item_af')->get();
        $clasificacion = DB::table('calificacion_acti_af')->get();
        $marca = DB::table('marca_af')->get();
        $modelo = DB::table('modelo_af')->get();
        $inventariador = DB::table('operador_movil')->get();
        $arreglo = [$almacen,$item,$clasificacion,$marca,$modelo,$inventariador];
        return response()->json($arreglo);

    }

    function iniciar(Request $usuari){
        
        $nombre = $usuari->name;
        $contra = $usuari->password;

        $user = DB::table('users')->where('name', $nombre)->where('password',$contra)->first();

        if($user){
            return response()->json($user->name);
        }
        else{
            return "error insert";
        }
        
    }
}
