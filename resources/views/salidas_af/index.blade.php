@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Gestión de Salidas</div>
                    <div class="card-body">
                        <div class="col-md-12 row">
                            <div class="col-md-4">
                                <a href="{{ url('/salidas_af/create') }}" class="btn btn-success btn-sm" title="Add New ciudad">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Nueva Salida
                                </a>
                            </div>
                            <div class="col-md-8 row">
                            <form method="GET" action="{{ url('/salidas_af') }}" accept-charset="UTF-8" class="col-md-12 row" role="search">
                                <div class="col-md-6">
                                    Tipo de Movimiento
                                    <select class="form-control" name="tipo_salida" id="" placeholder="TODOS">
                                        <option value="0">Todos</option>
                                        <option value="1">Transferecia</option>
                                        <option value="2">Prestamos</option>
                                        <option value="3">Mantenimiento</option>
                                        <option value="4">Bajas</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    Buscar
                                    <div class="input-group">
                                        
                                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                            <span class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                    Buscar
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                            </div>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Acciones</th>
                                        <th>Código</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Descripción</th>
                                        <th>Proveedor</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($salidas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ url('/ciudad/' . $item->id) }}" title="View ciudad"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/ciudad/' . $item->id . '/edit') }}" title="Edit ciudad"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/ciudad' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete ciudad" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->origen_suc }}</td>
                                        <td>{{ $item->desctino_suc }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->proveedor_name }}</td>
                                        <td >{{ ($item->estado)?'Activo':'Inactivo' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $salidas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-custom')
<!-- Aqui van los scripts para cada seccion, segun vean necesario -->
@endsection
