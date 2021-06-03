<?php

namespace App\Http\Controllers\salidas_af;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use App\Models\salidas_af;
use Illuminate\Http\Request;
use App\Http\Requests\salidas_afRe\salidas_transfeRequest;

class salida_transController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $salidas = salidas_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $salidas = salidas_af::paginate($perPage);
        }

        return view('salidas_af.salida_transferencia.index', compact('salidas'));
    }
    /* public function index_prestamo(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $salidas = salidas_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $salidas = salidas_af::paginate($perPage);
        }

        return view('salidas_af.index', compact('salidas'));
    }
    public function index_mantenimiento(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $salidas = salidas_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $salidas = salidas_af::paginate($perPage);
        }

        return view('salidas_af.index', compact('salidas'));
    }
    public function index_bajas(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $salidas = salidas_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $salidas = salidas_af::paginate($perPage);
        }

        return view('salidas_af.index', compact('salidas'));
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales=DB::table('sucursal_af')->get();
        $tipo_salida=DB::table('tipo_salida_af')->get();
        /* $proveedor=DB::table('proveedor_af')->get(); */

        return view('salidas_af.salida_transferencia.create',compact('sucursales','tipo_salida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(salidas_transfeRequest $request)
    {
        dd('hello');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
