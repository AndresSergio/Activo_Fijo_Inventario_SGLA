<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" name="descripcion" type="text" id="descripcion" value="{{ isset($turno_af->descripcion) ? $turno_af->descripcion : old('descripcion')}}" >
    {!! $errors->first('descripcion', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('horario_ini') ? 'has-error' : ''}}">
    <label for="horario_ini" class="control-label">{{ 'Horario Ini' }}</label>
    <input class="form-control {{$errors->has('horario_ini')?'is-invalid':''}}" name="horario_ini" type="time" id="horario_ini" value="{{ isset($turno_af->horario_ini) ? $turno_af->horario_ini : old('horario_ini')}}" >
    {!! $errors->first('horario_ini', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('horario_fin') ? 'has-error' : ''}}">
    <label for="horario_fin" class="control-label">{{ 'Horario Fin' }}</label>
    <input class="form-control {{$errors->has('horario_fin')?'is-invalid':''}}" name="horario_fin" type="time" id="horario_fin" value="{{ isset($turno_af->horario_fin) ? $turno_af->horario_fin : old('horario_fin')}}" >
    {!! $errors->first('horario_fin', '<p class="form-text text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control {{$errors->has('estado')?'is-invalid':''}}">        
        <option value="1">Activo</option>        
        <option value="2">Inactivo</option>        
    </select>
    {{-- <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($turno_af->estado) ? $turno_af->estado : ''}}" > --}}
    {!! $errors->first('estado', '<p class="form-text text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
