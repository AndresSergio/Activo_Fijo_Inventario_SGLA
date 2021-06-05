@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Crear Nuevo Tipo Responsable</div>
                    <div class="card-body">
                        <a href="{{ url('/tipo_resp_af') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/tipo_resp_af') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('tipo_resp_af.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
