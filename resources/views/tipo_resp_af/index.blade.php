@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Tipo de Responsable</div>
                    <div class="card-body">
                        <a href="{{ url('/tipo_resp_af/create') }}" class="btn btn-success btn-sm" title="Add New tipo_resp_af">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear
                        </a>

                        <form method="GET" action="{{ url('/tipo_resp_af') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Descripcion</th><th>Estado</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tipo_resp_af as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ ($item->estado)?'Activo':'Inactivo' }}</td>
                                        <td>
                                            <a href="{{ url('/tipo_resp_af/' . $item->id) }}" title="View tipo_resp_af"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/tipo_resp_af/' . $item->id . '/edit') }}" title="Edit tipo_resp_af"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/tipo_resp_af' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete tipo_resp_af" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tipo_resp_af->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
