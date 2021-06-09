@extends('layouts.app')

@section('documentos')

$usuid;

<documentasignacion-component csrf="{{ csrf_token() }}" documnt="{{$solicitud}}"></documentasignacion-component>

@endsection