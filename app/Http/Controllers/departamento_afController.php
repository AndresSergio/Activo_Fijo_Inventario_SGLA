<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\departamento_af;
use Illuminate\Http\Request;
use App\Http\Requests\departamento_afRequest;

class departamento_afController extends Controller
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
            $departamento_af = departamento_af::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $departamento_af = departamento_af::paginate($perPage);
        }

        return view('departamento_af.index', compact('departamento_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departamento_af.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(departamento_afRequest $request)
    {
        
        $requestData = $request->all();
        
        departamento_af::create($requestData);

        return redirect('departamento_af')->with('flash_message', 'departamento_af added!');
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
        $departamento_af = departamento_af::findOrFail($id);

        return view('departamento_af.show', compact('departamento_af'));
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
        $departamento_af = departamento_af::findOrFail($id);

        return view('departamento_af.edit', compact('departamento_af'));
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
        
        $departamento_af = departamento_af::findOrFail($id);
        $departamento_af->update($requestData);

        return redirect('departamento_af')->with('flash_message', 'departamento_af updated!');
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
        departamento_af::destroy($id);

        return redirect('departamento_af')->with('flash_message', 'departamento_af deleted!');
    }
}
