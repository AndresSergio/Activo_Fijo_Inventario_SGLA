{{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($modelo_af->id) ? $modelo_af->id : ''}}" >
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>  --}}
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($modelo_af->nombre) ? $modelo_af->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($modelo_af->descripcion) ? $modelo_af->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($modelo_af->estado) ? $modelo_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
