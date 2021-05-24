<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\area_af;
use Illuminate\Http\Request;

class area_afController extends Controller
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
            $area_af = area_af::where('codigo', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $area_af = area_af::latest()->paginate($perPage);
        }

        return view('area_af.index', compact('area_af'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('area_af.create');
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
        
        area_af::create($requestData);

        return redirect('area_af')->with('flash_message', 'area_af added!');
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
        $area_af = area_af::findOrFail($id);

        return view('area_af.show', compact('area_af'));
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
        $area_af = area_af::findOrFail($id);

        return view('area_af.edit', compact('area_af'));
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
        
        $area_af = area_af::findOrFail($id);
        $area_af->update($requestData);

        return redirect('area_af')->with('flash_message', 'area_af updated!');
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
        area_af::destroy($id);

        return redirect('area_af')->with('flash_message', 'area_af deleted!');
    }
}
