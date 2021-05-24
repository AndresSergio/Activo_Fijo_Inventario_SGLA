@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">sucursal_af {{ $sucursal_af->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sucursal_af') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sucursal_af/' . $sucursal_af->id . '/edit') }}" title="Edit sucursal_af"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sucursal_af' . '/' . $sucursal_af->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete sucursal_af" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sucursal_af->id }}</td>
                                    </tr>
                                    <tr><th> Id </th><td> {{ $sucursal_af->id }} </td></tr><tr><th> Codigo </th><td> {{ $sucursal_af->codigo }} </td></tr><tr><th> Descripcion </th><td> {{ $sucursal_af->descripcion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
