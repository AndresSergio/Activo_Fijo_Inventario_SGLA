<div class="col-md-12">
    <div class="col-md-12 row mr-0">
        <div class="col-md-4 ">
            <div class="card col-md-12 col-xs-12 col-sm-12">

        
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav" style="display:inline-block">
                <li class="nav-item">
                    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                        <span>Transferencia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                        <span>Préstamos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                        <span>Mantenimiento</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-3">
                        <span>Bajas</span>
                    </a>
                </li>
            </ul>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="card">
                        <div class="card-body row ">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('origen_suc') ? 'has-error' : ''}}">
                                    <label for="origen_suc" class="control-label">{{ 'Sucursal de Origen' }}</label>
                                    <select name="origen_suc" id="origen_suc" class="form-control {{$errors->has('origen_suc')?'is-invalid':''}}" >
                                        @foreach($sucursales as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('origen_suc', '<p class="form-text text-danger">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('destino_suc') ? 'has-error' : ''}}">
                                    <label for="descripcion" class="control-label">{{ 'Sucursal de Destino' }}</label>
                                    <select name="destino_suc" id="" class="form-control {{$errors->has('destino_suc')?'is-invalid':''}}">
                                        <option value="0">NINGUNO</option>
                                        @foreach($sucursales as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('destino_suc', '<p class="form-text text-danger">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                                    <label for="descripcion" class="control-label">{{ 'Descripción' }}</label>
                                    
                                    <input class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" name="descripcion" type="text" id="descripcion" value="{{ isset($salida_af->descripcion) ? $salida_af->descripcion : old('descripcion')}}" >
                                    {!! $errors->first('descripcion', '<p class="form-text text-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tabs-animation fade show " id="tab-content-1" role="tabpanel">
                    <div class="row">
                        <h2>hello2</h2>
                    </div>
                </div>
                <div class="tab-pane tabs-animation fade show " id="tab-content-2" role="tabpanel">
                    <div class="row">
                        <h2>hello3</h2>
                    </div>
                </div>
                <div class="tab-pane tabs-animation fade show " id="tab-content-3" role="tabpanel">
                    <div class="row">
                        <h2>hello4</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 pt-3">
        <div class="card col-md-12">
            <h2>tablas</h2>
            <example-component></example-component>
        </div>
    </div>
</div>









<!-- <div class="col-md-12 row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('origen_suc') ? 'has-error' : ''}}">
            <label for="origen_suc" class="control-label">{{ 'Sucursal de Origen' }}</label>
            <select name="origen_suc" id="origen_suc" class="form-control {{$errors->has('origen_suc')?'is-invalid':''}}" >
                @foreach($sucursales as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
            {!! $errors->first('origen_suc', '<p class="form-text text-danger">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('destino_suc') ? 'has-error' : ''}}">
            <label for="descripcion" class="control-label">{{ 'Sucursal de Destino' }}</label>
            <select name="destino_suc" id="" class="form-control {{$errors->has('destino_suc')?'is-invalid':''}}">
                <option value="0">NINGUNO</option>
                @foreach($sucursales as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
            {!! $errors->first('destino_suc', '<p class="form-text text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('tipo_salidafk') ? 'has-error' : ''}}">
            <label for="tipo_salidafk" class="control-label">{{ 'Tipo de Salida' }}</label>
            <select name="tipo_salidafk" id="" class="form-control {{$errors->has('tipo_salidafk')?'is-invalid':''}}">
                <option value="0">NINGUNA</option>
                @foreach($tipo_salida as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('destino_suc', '<p class="form-text text-danger">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('id_proveedor') ? 'has-error' : ''}}">
            <label for="id_proveedor" class="control-label">{{ 'Proveedor' }}</label>
            <select name="id_proveedor" id="" class="form-control {{$errors->has('id_proveedor')?'is-invalid':''}}">
                <option value="0">NINGUNO</option>
                @foreach($proveedor as $item)
                <option value="{{$item->id}}">{{$item->razon_social}}</option>
                @endforeach
            </select>
            {!! $errors->first('id_proveedor', '<p class="form-text text-danger">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripción' }}</label>
    
     <input class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" name="descripcion" type="text" id="descripcion" value="{{ isset($salida_af->descripcion) ? $salida_af->descripcion : old('descripcion')}}" >
    {!! $errors->first('descripcion', '<p class="form-text text-danger">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    
     <input class="form-control {{$errors->has('estado')?'is-invalid':''}}" name="estado" type="number" id="estado" value="{{ isset($ciudad->estado) ? $ciudad->estado : old('estado')}}" >
    {!! $errors->first('estado', '<p class="form-text text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
 -->