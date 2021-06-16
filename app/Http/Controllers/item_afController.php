<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\calificacion_acti_af;
use App\Models\item_af;
use App\Models\marca_af;
use App\Models\modelo_af;
use Illuminate\Http\Request;

class item_afController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $item_af = item_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('alto', 'LIKE', "%$keyword%")
                ->orWhere('ancho', 'LIKE', "%$keyword%")
                ->orWhere('largo', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('lote', 'LIKE', "%$keyword%")
                ->orWhere('tiempo_vida', 'LIKE', "%$keyword%")
                ->orWhere('control_mante', 'LIKE', "%$keyword%")
                ->orWhere('id_clasificacion', 'LIKE', "%$keyword%")
                ->orWhere('id_modelo', 'LIKE', "%$keyword%")
                ->orWhere('id_marca', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $item_af = item_af::select('item_af.*','ma.nombre as nombremarca','m.nombre as nombremodelo','ca.nombre as nombrecalifi')
            ->join('calificacion_acti_af as ca','ca.id','=','item_af.id_clasificacion')
            ->join('modelo_af as m','m.id','=','item_af.id_modelo')
            ->join('marca_af as ma','ma.id','=','item_af.id_marca')  
            ->paginate($perPage);
        }

        return view('item_af.index', compact('item_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $marca = marca_af::pluck('id','nombre');
        $modelo = modelo_af::pluck('id','nombre');
        $califica = calificacion_acti_af::pluck('id','nombre');
        return view('item_af.create',['marca'=> $marca, 'modelo'=>$modelo, 'califica' => $califica, 'item_af' => new item_af(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        item_af::create($requestData);

        return redirect('item_af')->with('flash_message', 'item_af added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item_af = item_af::findOrFail($id);

        return view('item_af.show', compact('item_af'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $item_af = item_af::findOrFail($id);

        return view('item_af.edit', compact('item_af'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $item_af = item_af::findOrFail($id);
        $item_af->update($requestData);

        return redirect('item_af')->with('flash_message', 'item_af updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        item_af::destroy($id);

        return redirect('item_af')->with('flash_message', 'item_af deleted!');
    }
}
