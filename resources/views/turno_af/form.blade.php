<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($turno_af->descripcion) ? $turno_af->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('horario_ini') ? 'has-error' : ''}}">
    <label for="horario_ini" class="control-label">{{ 'Horario Ini' }}</label>
    <input class="form-control" name="horario_ini" type="time" id="horario_ini" value="{{ isset($turno_af->horario_ini) ? $turno_af->horario_ini : ''}}" >
    {!! $errors->first('horario_ini', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('horario_fin') ? 'has-error' : ''}}">
    <label for="horario_fin" class="control-label">{{ 'Horario Fin' }}</label>
    <input class="form-control" name="horario_fin" type="time" id="horario_fin" value="{{ isset($turno_af->horario_fin) ? $turno_af->horario_fin : ''}}" >
    {!! $errors->first('horario_fin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($turno_af->estado) ? $turno_af->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
