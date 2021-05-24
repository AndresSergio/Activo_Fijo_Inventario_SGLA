<!-- {{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($item_af->id) ? $item_af->id : ''}}" >
    {!! $errors->first('id', '<p class="form-text text-danger">:message</p>') !!}
</div>  --}} -->
<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control {{$errors->has('codigo')?'is-invalid':''}}" name="codigo" type="number" id="codigo" value="{{ isset($item_af->codigo) ? $item_af->codigo : old('codigo')}}" >
    {!! $errors->first('codigo', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" type="text" id="nombre" value="{{ isset($item_af->nombre) ? $item_af->nombre : old('nombre')}}" >
    {!! $errors->first('nombre', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('alto') ? 'has-error' : ''}}">
    <label for="alto" class="control-label">{{ 'Alto' }}</label>
    <input class="form-control {{$errors->has('alto')?'is-invalid':''}}" name="alto" type="number" id="alto" value="{{ isset($item_af->alto) ? $item_af->alto : old('alto')}}" >
    {!! $errors->first('alto', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ancho') ? 'has-error' : ''}}">
    <label for="ancho" class="control-label">{{ 'Ancho' }}</label>
    <input class="form-control {{$errors->has('ancho')?'is-invalid':''}}" name="ancho" type="number" id="ancho" value="{{ isset($item_af->ancho) ? $item_af->ancho : old('ancho')}}" >
    {!! $errors->first('ancho', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('largo') ? 'has-error' : ''}}">
    <label for="largo" class="control-label">{{ 'Largo' }}</label>
    <input class="form-control {{$errors->has('largo')?'is-invalid':''}}" name="largo" type="number" id="largo" value="{{ isset($item_af->largo) ? $item_af->largo : old('largo')}}" >
    {!! $errors->first('largo', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control {{$errors->has('color')?'is-invalid':''}}" name="color" type="text" id="color" value="{{ isset($item_af->color) ? $item_af->color : old('color')}}" >
    {!! $errors->first('color', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lote') ? 'has-error' : ''}}">
    <label for="lote" class="control-label">{{ 'Lote' }}</label>
    <input class="form-control {{$errors->has('lote')?'is-invalid':''}}" name="lote" type="text" id="lote" value="{{ isset($item_af->lote) ? $item_af->lote : old('lote')}}" >
    {!! $errors->first('lote', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tiempo_vida') ? 'has-error' : ''}}">
    <label for="tiempo_vida" class="control-label">{{ 'Tiempo Vida' }}</label>
    <input class="form-control {{$errors->has('tiempo_vida')?'is-invalid':''}}" name="tiempo_vida" type="number" id="tiempo_vida" value="{{ isset($item_af->tiempo_vida) ? $item_af->tiempo_vida : old('tiempo_vida')}}" >
    {!! $errors->first('tiempo_vida', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('control_mante') ? 'has-error' : ''}}">
    <label for="control_mante" class="control-label">{{ 'Control Mante' }}</label>
    <input class="form-control {{$errors->has('control_mante')?'is-invalid':''}}" name="control_mante" type="number" id="control_mante" value="{{ isset($item_af->control_mante) ? $item_af->control_mante : old('control_mante')}}" >
    {!! $errors->first('control_mante', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_clasificacion') ? 'has-error' : ''}}">
    <label for="id_clasificacion" class="control-label">{{ 'Id Clasificacion' }}</label>
    <input class="form-control {{$errors->has('id_clasificacion')?'is-invalid':''}}" name="id_clasificacion" type="number" id="id_clasificacion" value="{{ isset($item_af->id_clasificacion) ? $item_af->id_clasificacion : old('id_clasificacion')}}" >
    {!! $errors->first('id_clasificacion', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_modelo') ? 'has-error' : ''}}">
    <label for="id_modelo" class="control-label">{{ 'Id Modelo' }}</label>
    <input class="form-control {{$errors->has('id_modelo')?'is-invalid':''}}" name="id_modelo" type="number" id="id_modelo" value="{{ isset($item_af->id_modelo) ? $item_af->id_modelo : old('id_modelo')}}" >
    {!! $errors->first('id_modelo', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_marca') ? 'has-error' : ''}}">
    <label for="id_marca" class="control-label">{{ 'Id Marca' }}</label>
    <input class="form-control {{$errors->has('id_marca')?'is-invalid':''}}" name="id_marca" type="number" id="id_marca" value="{{ isset($item_af->id_marca) ? $item_af->id_marca : old('id_marca')}}" >
    {!! $errors->first('id_marca', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($item_af->estado) ? $item_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
