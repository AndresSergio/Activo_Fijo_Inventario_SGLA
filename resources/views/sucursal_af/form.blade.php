{{--  <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($sucursal_af->id) ? $sucursal_af->id : ''}}" >
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>  --}}
<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control" name="codigo" type="text" id="codigo" value="{{ isset($sucursal_af->codigo) ? $sucursal_af->codigo : ''}}" >
    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($sucursal_af->descripcion) ? $sucursal_af->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_empresa') ? 'has-error' : ''}}">
    <label for="id_empresa" class="control-label">{{ 'Id Empresa' }}</label>
    <input class="form-control" name="id_empresa" type="number" id="id_empresa" value="{{ isset($sucursal_af->id_empresa) ? $sucursal_af->id_empresa : ''}}" >
    {!! $errors->first('id_empresa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_Departamento') ? 'has-error' : ''}}">
    <label for="id_Departamento" class="control-label">{{ 'Id Departamento' }}</label>
    <input class="form-control" name="id_Departamento" type="number" id="id_Departamento" value="{{ isset($sucursal_af->id_Departamento) ? $sucursal_af->id_Departamento : ''}}" >
    {!! $errors->first('id_Departamento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($sucursal_af->estado) ? $sucursal_af->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
