<!-- {{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($calificacion_acti_af->id) ? $calificacion_acti_af->id : ''}}" >
    {!! $errors->first('id', '<p class="form-text text-danger">:message</p>') !!}
</div>  --}} -->
<div class="form-group {{ $errors->has('codigo') ? 'is-invalid' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="codigo" type="text" id="codigo" value="{{ isset($calificacion_acti_af->codigo) ? $calificacion_acti_af->codigo :  old('codigo')}}" >
    {!! $errors->first('codigo', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" type="text" id="nombre" value="{{ isset($calificacion_acti_af->nombre) ? $calificacion_acti_af->nombre :  old('nombre')}}" >
    {!! $errors->first('nombre', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tiempo_vida') ? 'has-error' : ''}}">
    <label for="tiempo_vida" class="control-label">{{ 'Tiempo Vida' }}</label>
    <input class="form-control {{$errors->has('tiempo_vida')?'is-invalid':''}}" name="tiempo_vida" type="number" id="tiempo_vida" value="{{ isset($calificacion_acti_af->tiempo_vida) ? $calificacion_acti_af->tiempo_vida :  old('tiempo_vida')}}" >
    {!! $errors->first('tiempo_vida', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($calificacion_acti_af->estado) ? $calificacion_acti_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    <input class="form-control {{$errors->has('estado')?'is-invalid':''}}" name="estado" type="number" id="estado" value="{{ isset($calificacion_acti_af->estado) ? $calificacion_acti_af->estado :  old('estado')}}" >
    {!! $errors->first('estado', '<p class="form-text text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
