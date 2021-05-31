@extends('layouts.app')

@section('contenido')

@section('title', 'Ingreso por Compra')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Ingreso por Compra &nbsp;
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('ingresocompra/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; Nuevo Ingreso</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>                                    
                                    <th >ID</th>
                                    <th >N° Documento</th>
                                    <th >Tipo de Documento</th>
                                    <th >Fecha Reistro</th>                                    
                                    <th >Tipo de Ingreso</th>
                                    <th >Responsable</th>
                                    <th >Estado</th>
                                    <th >Acciones</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingreso as $ingr)                                                                
                                    <tr>                                    
                                        <td>{{$ingr->id}}</td>
                                        <td>{{$ingr->numero_doc}}</td>
                                        <td>{{$ingr->tipo_doc}}</td>
                                        <td>{{$ingr->fecha_reg}}</td>                                    
                                        <td>{{$ingr->descripcionsucursal}}</td>
                                        <td>{{$ingr->nombreresponsable}} {{$ingr->apellidoresponsable}}</td>
                                        <td>{{$ingr->estado}}</td>
                                        
                                        <td>
                                            {{-- <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection