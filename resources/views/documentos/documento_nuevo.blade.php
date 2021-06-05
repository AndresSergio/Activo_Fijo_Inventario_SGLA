@extends('layouts.app')

@section('documentos')

<documentonuevo-component csrf="{{ csrf_token() }}" ecargado="{{$usuid}}"></documentonuevo-component>

@endsection