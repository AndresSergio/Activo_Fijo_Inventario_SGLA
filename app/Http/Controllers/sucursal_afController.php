<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\sucursal_af;
use Illuminate\Http\Request;

class sucursal_afController extends Controller
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
            $sucursal_af = sucursal_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('id_empresa', 'LIKE', "%$keyword%")
                ->orWhere('id_Departamento', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $sucursal_af = sucursal_af::paginate($perPage);
        }

        return view('sucursal_af.index', compact('sucursal_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sucursal_af.create');
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
        
        sucursal_af::create($requestData);

        return redirect('sucursal_af')->with('flash_message', 'sucursal_af added!');
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
        $sucursal_af = sucursal_af::findOrFail($id);

        return view('sucursal_af.show', compact('sucursal_af'));
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
        $sucursal_af = sucursal_af::findOrFail($id);

        return view('sucursal_af.edit', compact('sucursal_af'));
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
        
        $sucursal_af = sucursal_af::findOrFail($id);
        $sucursal_af->update($requestData);

        return redirect('sucursal_af')->with('flash_message', 'sucursal_af updated!');
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
        sucursal_af::destroy($id);

        return redirect('sucursal_af')->with('flash_message', 'sucursal_af deleted!');
    }
}
