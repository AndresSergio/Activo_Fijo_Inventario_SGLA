<?php

namespace App\Http\Controllers;

use App\DetalleIngreso;
use App\Http\Requests\IngresoCompraRequest;
use App\IngresoCompra as IngresoCompra;
use App\Models\sucursal_af;
use App\TipoIngresoAF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingreso = IngresoCompra::select('ingreso_af.*','saf.descripcion as descripcionsucursal','raf.nombre as nombreresponsable','raf.apellido as apellidoresponsable')        
        ->join('sucursal_af as saf','saf.id','=','ingreso_af.id_sucursal')
        ->join('responsable_af as raf','raf.id','=','ingreso_af.id_responsable')        
        ->get();
        return view('ingresocompra.index', compact('ingreso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = DB::table('item_af as i')
        ->select(DB::raw('CONCAT(i.codigo, " ",i.nombre) AS item'),'i.id')
        ->where('i.estado','=','1')
        ->get();
        return view('ingresocompra.create',["items"=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->detalle_articulos);
        

        try{




            DB::beginTransaction();    
            $ingreso = new IngresoCompra;
            $ingreso->numero_doc=$request->get('numero_doc');
            $ingreso->id_tipo_ingr=$request->get('id_tipo_ingr');
            $ingreso->id_sucursal=$request->get('id_sucursal');
            $ingreso->id_responsable=$request->get('id_responsable');
            $ingreso->tipo_doc=$request->get('tipo_doc');
            
            $mytime = Carbon::now('America/La_Paz');
            $ingreso->fecha_reg=$mytime->toDateTimeString();
            $ingreso->estado='1';
            $ingreso->save();
            
            $id_item = $request->get('id_item');        
            $det_descripcion = $request->get('det_descripcion');
            $cantidad = $request->get('cantidad');

           /*  $cont = 0; */

            $det = $request->detalle_articulos;
            
            foreach ($det as $key => $value) {
                //dd($value['nombre   ']);//desparciar el id y nombre
                $cod_item = explode(" ",$value['itemid']);
                //dd($value['cantidad']);
                $detallecompra = new DetalleIngreso();
                $detallecompra->id_ingreso = $ingreso->id; 
                $detallecompra->id_item = (int)$cod_item[0]; 
                $detallecompra->det_descripcion = $value['descripcion'];
                $detallecompra->cantidad = (int)$value['cantidad'];
                $detallecompra->save();
                /* $cont=$cont+1; */  

            }
            /* while($cont < count($id_item)){
                $detallecompra = new DetalleIngreso();
                $detallecompra->id_ingreso = $ingreso->id; 
                $detallecompra->det_descripcion = $det_descripcion[$cont];
                $detallecompra->cantidad = $cantidad[$cont];
                $detallecompra->save();
                $cont=$cont+1;  
            } */
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
        }
        
        return redirect()->route('ingresocompra.index')->with('flash_message', 'Ingreso de Compra registrada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function show(IngresoCompra $ingresoCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(IngresoCompra $ingresoCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngresoCompra $ingresoCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngresoCompra $ingresoCompra)
    {
        //
    }
}
