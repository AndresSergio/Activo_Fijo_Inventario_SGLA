<!-- {{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($departamento_af->id) ? $departamento_af->id : ''}}" >
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>  --}} -->
<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control {{$errors->has('codigo')?'is-invalid':''}}" name="codigo" type="number" id="codigo" value="{{ isset($departamento_af->codigo) ? $departamento_af->codigo : old('codigo')}}" >
    {!! $errors->first('codigo', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" type="text" id="nombre" value="{{ isset($departamento_af->nombre) ? $departamento_af->nombre : old('nombre')}}" >
    {!! $errors->first('nombre', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
<<<<<<< HEAD
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($departamento_af->estado) ? $departamento_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
=======
    <input class="form-control {{$errors->has('estado')?'is-invalid':''}}" name="estado" type="number" id="estado" value="{{ isset($departamento_af->estado) ? $departamento_af->estado : old('estado')}}" >
    {!! $errors->first('estado', '<p class="form-text text-danger">:message</p>') !!}
>>>>>>> 17baf7aaae07c8fa9e4f0a9b4a4337d68c6b916b
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
