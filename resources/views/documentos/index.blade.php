@extends('layouts.app')

@section('documentos')

<div class="card-header">
    <i class="fa fa-align-justify"></i> Documentos &nbsp;
    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('documentos/nuevo') }}" role="button"><i class="fa fa-plus"></i>&nbsp; Nuevo Documento</a>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">

        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Opciones</th>
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
                        <td>
                            <a href="Asignacion/nuevo/{{$doc->id}}" ><button class="btn btn-primary btn-sm">Asignar Activos</button></a>
                        </td>
                        <td>{{$doc->tdnombre}}</td>
                        <td>{{$doc->creacion}}</td>
                        <td>{{$doc->entrega}}</td>
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