<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\turno_af;
use Illuminate\Http\Request;

class turno_afController extends Controller
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
            $turno_af = turno_af::where('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('horario_ini', 'LIKE', "%$keyword%")
                ->orWhere('horario_fin', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $turno_af = turno_af::paginate($perPage);
        }

        return view('turno_af.index', compact('turno_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('turno_af.create');
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
        
        turno_af::create($requestData);

        return redirect('turno_af')->with('flash_message', 'turno_af added!');
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
        $turno_af = turno_af::findOrFail($id);

        return view('turno_af.show', compact('turno_af'));
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
        $turno_af = turno_af::findOrFail($id);

        return view('turno_af.edit', compact('turno_af'));
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
        
        $turno_af = turno_af::findOrFail($id);
        $turno_af->update($requestData);

        return redirect('turno_af')->with('flash_message', 'turno_af updated!');
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
        turno_af::destroy($id);

        return redirect('turno_af')->with('flash_message', 'turno_af deleted!');
    }
}
