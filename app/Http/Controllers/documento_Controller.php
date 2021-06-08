<?php

namespace App\Http\Controllers;

use App\documento_af;
use App\Models\responsable_af;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class documento_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // pasar el select a los documentos en lugar de un homa mundo
        $keyword = $request->get('search');
        $documento = documento_af::select('documento_af.*','TD_af.nombre as tdnombre','RE_af.nombre as renombre','SE_af.nombre as senombre','AR_af.nombre as arnombre')
        ->join('tipo_documento_af as TD_af','TD_af.id','=','documento_af.id_tipo_doc')
        ->join('responsable_af as RE_af','RE_af.id','=','documento_af.id_trabajador')
        ->join('sector_af as SE_af','SE_af.id','=','RE_af.id_sector')
        ->join('area_af as AR_af','AR_af.id','=','SE_af.id_area')
        ->where('documento_af.estado','=','1')
        ->paginate(10);
        //dd($documento);
        return view('documentos.index', ['documento'=>$documento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuid = Auth::user();
        return view('documentos.documento_nuevo', compact('usuid'));
    }

    public function insert_documento(request $request){
        /* $id_encargado = $request->area_IDencargado;
        $name_encargado = $request->area_NAMEencargado;
        $id_colaborador = $request->colaborador_id;
        $name_colaborador = $request->colaborador_name;
        $ci_colaborador = $request->colaborador_ci;
        $id_area = $request->area_id;
        $id_sector = $request->sector_id;
        $tipo_doc = $request->id_tipo_doc;
        $fecha_entrega = $request->fecha_entrega;
        $descripcion = $request->descripcion; */
        $respuesta=0;
        try {
            //code...
            DB::beginTransaction();

            $documento=new documento_af;
            $documento->id_responsable = $request->area_IDencargado;
            $documento->id_trabajador = $request->colaborador_ci;
            $documento->id_tipo_doc = $request->id_tipo_doc;

            $mytime = Carbon::now('America/La_Paz');
            $documento->fecha_creacion=$mytime->toDateTimeString();

            $documento->fecha_entrega = $request->fecha_entrega;
            $documento->descripcion = $request->descripcion;
            $documento->directorio = 'pueba.pdf';
            $documento->save();

            $respuesta = $documento->id;
            DB::commit();
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }     
        
        return ['id'=>$respuesta];
    }

    public function get_colaboradores(request $request){
        $codigo = $request->get('search');
        $perPage = 10;

        $select_colaboradores = responsable_af::join('sector_af as sec','sec.id','=','responsable_af.id_sector')
        ->join('area_af as a','a.id','=','sec.id_area')
        ->select('responsable_af.id','responsable_af.nombre','responsable_af.apellido','responsable_af.ci','responsable_af.telefono','sec.id as sec_id','sec.nombre as sec_nom','a.id as a_id','a.nombre as are_nom')
        ->where('responsable_af.estado','=','1')
        ->where('responsable_af.tipo_resp','=','3')
        ->paginate($perPage);

        return ['src'=>$select_colaboradores,
                'paginate'=>[
                    'total'         =>$select_colaboradores->total(),
                    'current_page'  =>$select_colaboradores->currentPage(),
                    'per_page'      =>$select_colaboradores->perPage(),
                    'last_page'     =>$select_colaboradores->lastPage(),
                    'from'          =>$select_colaboradores->firstItem(),
                    'to'            =>$select_colaboradores->lastPage(),

                ]
        ];
    }

    /* public function get_area(){
        $select_area = DB::table('area_af')
        ->select('id','nombre','codigo')
        ->where('estado','=','1')
        ->get();
        return ['getArea'=>$select_area];
    }

    public function get_sector(){
        $select_secttor = DB::table('sector_af')
        ->select('id','nombre','codigo')
        ->where('estado','=','1')
        ->get();
        return ['getSector'=>$select_secttor];
    } */

    public function get_itens(){
        $select_iten = DB::table('almacen_activo_af')
        ->select('id','foto')
        ->where('estado','=','1')
        ->orderBy('foto')
        ->get();
        return ['getIten'=>$select_iten];
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
