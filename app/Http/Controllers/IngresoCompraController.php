<?php

namespace App\Http\Controllers;

use App\DetalleIngreso;
use App\Http\Requests\IngresoCompraRequest;
use App\IngresoCompra as IngresoCompra;
use App\Models\sucursal_af;
use App\Models\almacen_activo_af;
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
        ->join('users as raf','raf.id','=','ingreso_af.id_responsable')
        ->join('tipo_ingreso_af as tiaf','tiaf.id','=','ingreso_af.id_tipo_ingr')
        ->where('tiaf.id','=','1')
        ->orderBy('id','DESC')        
        ->paginate(10);
       /*  dd($ingreso); */
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
    public function ingreso_alm_compra(Request $request)
    {
     
        try {
            DB::beginTransaction();  
            $id=$request->id;
            $ingreso = IngresoCompra::where('estado',1)->where('id',$id)->first();
            $update_ingreso=IngresoCompra::where('estado',1)->where('id',$id)->update(['estado' => 2]);

            if ($ingreso) {
                $detalleingreso = DetalleIngreso::select('detalle_ingr_af.*','ia.nombre as nombreitem')
                ->join('item_af as ia','ia.id','=','detalle_ingr_af.id_item')
                ->where('detalle_ingr_af.id_ingreso','=',$id)
                ->get();
               
                foreach ($detalleingreso as $key => $value) {
                        $lastid=DB::select('SELECT MAX(serie) As se from almacen_activo_af ');          //obtengo la serie
                        $last_serie=($lastid[0]->se);                                                   //declaro mejor la variable
                        if (empty($last_serie)) {
                            $last_serie='1001';                                                          //serie a elejir cambiar a gusto
                        }
                    for ($i=0; $i <(int)$value->cantidad ; $i++) { 
                        $last_serie=(int)$last_serie+1;
                        $alm = almacen_activo_af::create([
                            'codigo_item'=>$value->id_item,
                            'serie'=>$last_serie,
                            'observacion'=>0,
                            'foto'=>'',
                            'id_det_ingreso'=>$value->id_ingreso,
                            'estado'=>1,
                        ]);
                    }
                   
                }
            }
            DB::commit();
            return back()->with('cargado', 'Ingresado Corrrectamente al Almacén!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('carga_fallida', $e);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            
            /* $id_item = $request->get('id_item');        
            $det_descripcion = $request->get('det_descripcion');
            $cantidad = $request->get('cantidad'); */

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
            return [
                    'mensaje_c'=>'Ingreso de Compra registrada!',
                    'estado_c'=>true
                    ];
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return ['mensaje_c2'=>'Ingreso de Compra Fallida!'.$e,
                    'estado_c'=>true
                    ];
        }
        
        /* return redirect()->route('ingresocompra.index')->with('flash_message', 'Ingreso de Compra registrada!'); */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //dd($id);
        $ingreso = IngresoCompra::select('ingreso_af.*','ra.nombre as nombrerespo', 'tiaf.nombre as nombretipoingreso', 's.descripcion as descripcionsucursal')
            ->join('tipo_ingreso_af as tiaf','tiaf.id','=','ingreso_af.id_tipo_ingr')            
            ->join('sucursal_af as s','s.id','=','ingreso_af.id_sucursal')
            ->join('users as ra','ra.id','=','ingreso_af.id_responsable')        
            ->where('ingreso_af.id','=',$id)
            ->first();

        $detalleingreso = DetalleIngreso::select('detalle_ingr_af.*','ia.nombre as nombreitem')
            ->join('item_af as ia','ia.id','=','detalle_ingr_af.id_item')
            ->where('detalle_ingr_af.id_ingreso','=',$id)
            ->get();
        
        //dd($detalleingreso);
        return view('ingresocompra.show',['ingreso'=>$ingreso, 'detalleingreso'=>$detalleingreso]);
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

    public function cambioestado(IngresoCompra $ingreso)
    {
        # code...
        $valor = $ingreso->estado;

        if($valor == '1'){

            $ingreso->update(['estado' => '3']);
            return redirect()->route('equipomateriales.index')->with('status','Se acaba de actualizar el estado a Inhabilitado');
        }
        else{
            $ingreso->update(['estado' => '1']);
            return redirect()->route('equipomateriales.index')->with('status','Se acaba de actualizar el estado a activo');
        }

    }
}
