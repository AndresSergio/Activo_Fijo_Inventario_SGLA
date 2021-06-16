@extends('layouts.app')

@section('contenido')

@section('title', 'Ingreso por Compra')

<ingresocompra-component csrf="{{ csrf_token() }}" it="{{$items}}"></ingresocompra-component>

@endsection