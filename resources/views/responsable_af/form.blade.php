<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($responsable_af->nombre) ? $responsable_af->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="apellido" class="control-label">{{ 'Apellido' }}</label>
    <input class="form-control" name="apellido" type="text" id="apellido" value="{{ isset($responsable_af->apellido) ? $responsable_af->apellido : ''}}" >
    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    <label for="ci" class="control-label">{{ 'Ci' }}</label>
    <input class="form-control" name="ci" type="number" id="ci" value="{{ isset($responsable_af->ci) ? $responsable_af->ci : ''}}" >
    {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
    <input class="form-control" name="telefono" type="number" id="telefono" value="{{ isset($responsable_af->telefono) ? $responsable_af->telefono : ''}}" >
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($responsable_af->direccion) ? $responsable_af->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo_resp') ? 'has-error' : ''}}">
    <label for="tipo_resp" class="control-label">{{ 'Tipo Resp' }}</label>
    <input class="form-control" name="tipo_resp" type="number" id="tipo_resp" value="{{ isset($responsable_af->tipo_resp) ? $responsable_af->tipo_resp : ''}}" >
    {!! $errors->first('tipo_resp', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_sector') ? 'has-error' : ''}}">
    <label for="id_sector" class="control-label">{{ 'Id Sector' }}</label>
    <input class="form-control" name="id_sector" type="number" id="id_sector" value="{{ isset($responsable_af->id_sector) ? $responsable_af->id_sector : ''}}" >
    {!! $errors->first('id_sector', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_turno') ? 'has-error' : ''}}">
    <label for="id_turno" class="control-label">{{ 'Id Turno' }}</label>
    <input class="form-control" name="id_turno" type="number" id="id_turno" value="{{ isset($responsable_af->id_turno) ? $responsable_af->id_turno : ''}}" >
    {!! $errors->first('id_turno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($responsable_af->estado) ? $responsable_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
