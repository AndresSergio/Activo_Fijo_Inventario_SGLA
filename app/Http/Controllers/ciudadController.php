<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\ciudadRequest;

class ciudadController extends Controller
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
            $ciudad = ciudad::where('id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $ciudad = ciudad::paginate($perPage);
        }

        return view('ciudad.index', compact('ciudad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ciudad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ciudadRequest $request)
    {
        
        $requestData = $request->all();
        
        $ciudad= ciudad::create($requestData);
        /* dd($ciudad->fails()); */
        /* if ($ciudad->fails())
        {
        return Redirect::back()->withErrors($validator)->withInput();
        }		
        return View::make('performances.satisfactorio',compact('usuario','inicio_turno'));
        } */

        return redirect('ciudad')->with('flash_message', 'ciudad registrada!');
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
        $ciudad = ciudad::findOrFail($id);

        return view('ciudad.show', compact('ciudad'));
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
        $ciudad = ciudad::findOrFail($id);

        return view('ciudad.edit', compact('ciudad'));
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
        
        $ciudad = ciudad::findOrFail($id);
        $ciudad->update($requestData);

        return redirect('ciudad')->with('flash_message', 'ciudad updated!');
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
        ciudad::destroy($id);

        return redirect('ciudad')->with('flash_message', 'ciudad deleted!');
    }
}
