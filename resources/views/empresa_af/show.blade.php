@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">empresa_af {{ $empresa_af->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/empresa_af') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/empresa_af/' . $empresa_af->id . '/edit') }}" title="Edit empresa_af"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('empresa_af' . '/' . $empresa_af->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete empresa_af" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!-- <tr>
                                        <th>ID</th><td>{{ $empresa_af->id }}</td>
                                    </tr> -->
                                    <tr><th> Id </th><td> {{ $empresa_af->id }} </td></tr><tr><th> Nombre </th><td> {{ $empresa_af->nombre }} </td></tr><tr><th> Nit </th><td> {{ $empresa_af->nit }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
