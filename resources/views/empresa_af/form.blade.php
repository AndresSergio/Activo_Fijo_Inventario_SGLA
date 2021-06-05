<!-- {{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($empresa_af->id) ? $empresa_af->id : ''}}" >
    {!! $errors->first('id', '<p class="form-text text-danger">:message</p>') !!}
</div>  --}} -->
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" type="text" id="nombre" value="{{ isset($empresa_af->nombre) ? $empresa_af->nombre : old('nombre')}}" >
    {!! $errors->first('nombre', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
    <label for="nit" class="control-label">{{ 'Nit' }}</label>
    <input class="form-control {{$errors->has('nit')?'is-invalid':''}}" name="nit" type="number" id="nit" value="{{ isset($empresa_af->nit) ? $empresa_af->nit : old('nit')}}" >
    {!! $errors->first('nit', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" name="descripcion" type="text" id="descripcion" value="{{ isset($empresa_af->descripcion) ? $empresa_af->descripcion : old('descripcion')}}" >
    {!! $errors->first('descripcion', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($empresa_af->estado) ? $empresa_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="form-text text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
