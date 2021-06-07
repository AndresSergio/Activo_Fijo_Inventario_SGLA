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
                        <table class="table table-hover table-striped table-bordered" >
                            <thead>
                                <tr>                                    
                                    <th >ID</th>
                                    <th >N° Documento</th>
                                    <th >Tipo de Documento</th>
                                    <th >Fecha Registro</th>                                    
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
                                        @if ($ingr->tipo_doc == '1')
                                        <td>Factura</td>
                                        
                                        @endif
                                        @if ($ingr->tipo_doc == '2')
                                        <td>Nota de Compra</td>
                                        
                                        @endif
                                        @if ($ingr->tipo_doc == '3')
                                        <td>Recibo</td>
                                        
                                        @endif                                        
                                        <td>{{$ingr->fecha_reg}}</td>                                    
                                        <td>{{$ingr->descripcionsucursal}}</td>
                                        <td>{{$ingr->nombreresponsable}} {{$ingr->apellidoresponsable}}</td>
                                        @if ($ingr->estado == '1')
                                        <td class="badge badge-danger ml-2 mt-1">Por Ingresar</td>
                                        @endif                                                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">                                                
                                                    <a class="btn btn-sm btn-spinner btn-info" role="button" href="ingresocompra/show/{{$ingr->id}}" title="Ver Registro" >
                                                        <i class="fa fa-eye"></i>
                                                    </a> 
                                                    
                                                    <a class="btn btn-sm btn-spinner btn-success" id="" data-target="#cambioestado{{$ingr->id}}" role="button"  title="Cambiar Estado" data-toggle="modal"  >
                                                        <i class="fa fa-retweet" aria-hidden="true"></i>
                                                    </a>                                                                                                                                                        
                                                        <div class="modal fade" id="cambioestado{{$ingr->id}}" role="dialog" aria-labelledby="cambioestadoLabel" aria-hidden="true" tabindex="-1">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar el Estado                                                                
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    @include('ingresocompra/cambio',['ingre'=>$ingr])
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    <a class="btn btn-sm btn-spinner btn-warning" role="button"  title="Ingresar al Almacen" >
                                                        <i class="fa fa-linux" aria-hidden="true"></i>
                                                    </a>                                        
                                                </div>                                                                                                
                                            </div>
                                             
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>   
                                             
                    </div>
                    {{$ingreso->links()}} 
                </div>
            </div>        
        </div>        
    </div>
    <script>
        $(document).ready(function () {
            $('#reco').on('input change', function () {
                if ($(this).val() != '') {
                    $('#submit').prop('disabled', false);
                }
                else {
                    $('#submit').prop('disabled', true);
                }
            });
        });
    </script>
@endsection


