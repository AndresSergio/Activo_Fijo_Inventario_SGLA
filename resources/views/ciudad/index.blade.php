@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Ciudad</div>
                    <div class="card-body">
                        <a href="{{ url('/ciudad/create') }}" class="btn btn-success btn-sm" title="Add New ciudad">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear
                        </a>

                        <form method="GET" action="{{ url('/ciudad') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th>                                        
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ciudad as $item)
                                    <tr>                                
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->codigo }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        @if ($item->estado == '1')
                                        <td >Activo</td>                                                                                    
                                        @else
                                        <td >Inactivo</td>                                        
                                        @endif
                                        {{-- <td >{{ ($item->estado)?'Activo':'Inactivo' }}</td> --}}
                                        <td>
                                            <a href="{{ url('/ciudad/' . $item->id) }}" title="View ciudad"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/ciudad/' . $item->id . '/edit') }}" title="Edit ciudad"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/ciudad' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete ciudad" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ciudad->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
