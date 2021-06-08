@extends('layouts.app')

@section('documentos')

<div class="card-header">
    <i class="fa fa-align-justify"></i> Documentos &nbsp;
    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('documentos.nuevo') }}" role="button"><i class="fa fa-plus"></i>&nbsp; Nuevo Documento</a>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">

        <form method="GET" action="{{ url('/documento') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Creacion</th>
                    <th>Entrega</th>
                    <th>Responsable</th>
                    <th>Area</th>
                    <th>Sector</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($documento as $doc)
                    <tr>
                        <td>{{$doc->tdnombre}}</td>
                        <td>{{$doc->fecha_creacion}}</td>
                        <td>{{$doc->fecha_entrega}}</td>
                        <td>{{$doc->renombre}}</td>
                        <td>{{$doc->senombre}}</td>
                        <td>{{$doc->arnombre}}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection