<?php

namespace App\Http\Controllers;

use App\IngresoCompra;
use Illuminate\Http\Request;

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
        return view('ingreso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ingreso.create');
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
     * @param  \App\IngresoCompra  $ingresoCompra
     * @return \Illuminate\Http\Response
     */
    public function show(IngresoCompra $ingresoCompra)
    {
        //
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
}
