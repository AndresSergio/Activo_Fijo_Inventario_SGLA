@extends('layouts.app')

@section('contenido')
<div>
    <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <h3>Consulta de Ingreso por Compra</h3>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <a href="/ingresocompra">
                <button class="mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-secondary" > 
                    <i class="lnr-arrow-left btn-icon-wrapper"> </i> Volver
                </button>   
            </a>        
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">     
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="numero_doc">Número de Documento</label>
                        <input type="text" id="numero_doc" name="numero_doc" disabled value="{{ $ingreso->numero_doc }}"  class="form-control" >
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group">
                        <label for="id_tipo_ingr">Tipo Ingreso</label>
                        <input type="text" id="id_tipo_ingr" name="id_tipo_ingr" value="{{ $ingreso->id_tipo_ingr }}"  class="form-control" >
                    </div>
                </div> --}}
                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12"  >
                    <div class="form-group">
                        <label for="id_sucursal">Sucursal</label>
                        <input type="text" id="id_sucursal" name="id_sucursal" disabled value="{{ $ingreso->descripcionsucursal }}"  class="form-control" >
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        @if ($ingreso->tipo_doc == '1')
                        <input type="text" id="tipo_doc" name="tipo_doc" disabled value="Factura"  class="form-control" >
                        @endif
                        @if ($ingreso->tipo_doc == '2')
                        <input type="text" id="tipo_doc" name="tipo_doc" disabled value="Nota de Compra"  class="form-control" >
                        @endif
                        @if ($ingreso->tipo_doc == '3')
                        <input type="text" id="tipo_doc" name="tipo_doc" disabled value="Recibo"  class="form-control" >
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group">
                        <label for="id_responsable">Responsable</label>
                        <input type="text" id="id_responsable" name="id_responsable" disabled value="{{ $ingreso->nombrerespo }}"  class="form-control" >
                    </div>
                </div>            
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-body">       
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th>Item</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>                                        
                                <tbody>
                                    <tr>                                    
                                        <td >{{$}}</td>                                            
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group" >                                                
                        <button class="btn btn-danger" type="reset">Cancelar</button>                                
                    </div>
                </div>
            </div>  
        </div>
    </div>  
</div>
@endsection