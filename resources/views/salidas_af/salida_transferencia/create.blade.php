@extends('layouts.app')

@section('contenido')
    <div >
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="float:left" class="col-md-10"><strong>Nueva Salida Por Transferencia</strong></div>
                        <div style="float:right" class="col-md-2 text-right text-center-sm"> <a href="{{ url('/salidas_transferencia') }}" title="Back"><button class="btn btn-warning btn-sm "><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a></div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/salidas_transferencia') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('salidas_af.salida_transferencia.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
