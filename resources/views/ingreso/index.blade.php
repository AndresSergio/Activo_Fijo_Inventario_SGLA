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
                                    <th >Fecha Reistro</th>                                    
                                    <th >Sucursal</th>
                                    <th >Responsable</th>
                                    <th >Estado</th>
                                    <th >Acciones</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    

                                    <td>1</td>
                                    <td>nuevoasdasdasdasd</td>
                                    <td>nuevoasasdasdasdasasdasdasda</td>
                                    <td>nuevoasdasdasdasasdasdasdasd</td>
                                    <td>nuevoasdasdasdasdasdasdasdasd</td>
                                    <td>nuevoasdasdasdasdasd</td>
                                    <td></td>
                                    
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection