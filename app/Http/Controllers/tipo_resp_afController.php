<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\tipo_resp_af;
use Illuminate\Http\Request;

class tipo_resp_afController extends Controller
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
            $tipo_resp_af = tipo_resp_af::where('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $tipo_resp_af = tipo_resp_af::paginate($perPage);
        }

        return view('tipo_resp_af.index', compact('tipo_resp_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo_resp_af.create');
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
        
        tipo_resp_af::create($requestData);

        return redirect('tipo_resp_af')->with('flash_message', 'tipo_resp_af added!');
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
        $tipo_resp_af = tipo_resp_af::findOrFail($id);

        return view('tipo_resp_af.show', compact('tipo_resp_af'));
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
        $tipo_resp_af = tipo_resp_af::findOrFail($id);

        return view('tipo_resp_af.edit', compact('tipo_resp_af'));
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
        
        $tipo_resp_af = tipo_resp_af::findOrFail($id);
        $tipo_resp_af->update($requestData);

        return redirect('tipo_resp_af')->with('flash_message', 'tipo_resp_af updated!');
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
        tipo_resp_af::destroy($id);

        return redirect('tipo_resp_af')->with('flash_message', 'tipo_resp_af deleted!');
    }
}
