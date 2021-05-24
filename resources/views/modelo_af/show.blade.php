@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Modelo #{{ $modelo_af->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/modelo_af') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/modelo_af/' . $modelo_af->id . '/edit') }}" title="Edit modelo_af"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('modelo_af' . '/' . $modelo_af->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete modelo_af" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- <tr>
                                        <th>ID</th><td>{{ $modelo_af->id }}</td>
                                    </tr> -->
                                    <tr><th> Id </th><td> {{ $modelo_af->id }} </td></tr><tr><th> Nombre </th><td> {{ $modelo_af->nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $modelo_af->descripcion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
