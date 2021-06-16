<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\calificacion_acti_af;
use Illuminate\Http\Request;
use App\Http\Requests\calificaion_acti_afRequest;

class calificacion_acti_afController extends Controller
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
            $calificacion_acti_af = calificacion_acti_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('tiempo_vida', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $calificacion_acti_af = calificacion_acti_af::paginate($perPage);
        }

        return view('calificacion_acti_af.index', compact('calificacion_acti_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('calificacion_acti_af.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(calificaion_acti_afRequest $request)
    {
        
        $requestData = $request->all();
        
        calificacion_acti_af::create($requestData);

        return redirect('calificacion_acti_af')->with('flash_message', 'calificacion_acti_af added!');
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
        $calificacion_acti_af = calificacion_acti_af::findOrFail($id);

        return view('calificacion_acti_af.show', compact('calificacion_acti_af'));
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
        $calificacion_acti_af = calificacion_acti_af::findOrFail($id);

        return view('calificacion_acti_af.edit', compact('calificacion_acti_af'));
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
        
        $calificacion_acti_af = calificacion_acti_af::findOrFail($id);
        $calificacion_acti_af->update($requestData);

        return redirect('calificacion_acti_af')->with('flash_message', 'calificacion_acti_af updated!');
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
        calificacion_acti_af::destroy($id);

        return redirect('calificacion_acti_af')->with('flash_message', 'calificacion_acti_af deleted!');
    }
}
