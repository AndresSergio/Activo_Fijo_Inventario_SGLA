@extends('layouts.app')

@section('documentos')
{{ $solicitud }}
<asignacion-component csrf="{{ csrf_token() }}" encargado="{{ $usuid }}" documnt="{{ $solicitud }}"></asignacion-component>

@endsection