@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center">
                <h1 style="font-size: 65px" class="color-n-primary">Asistenci<i class="fas fa-check"></i></h1>
            </div>
            <div class="card">

                <div class="card-body text-center">
                    <h4>El codigo para registrar asistencia es : </h4>
                    <h1 class="codeAsistencia" style="font-size: 100px">{{ $requestItem["code"] }}</h1>
                    <div>
                        <p> <span class="parch-text p-2"> Grupo:</span>  {{ $requestItem["group"] }}</p>
                        <p> <span class="parch-text p-2"> Docente:</span>  {{ $requestItem["teacher"] }}</p>
                        <p> <span class="parch-text p-2"> Fecha:</span>  {{ $requestItem["date"] }}</p>
                        <p> <span class="parch-text p-2"> Completada:</span>  {{ ($requestItem["state"] == 1) ? "SI" : "NO" }}</p>
                    </div>
                </div>
            </div>

            <div class="my-2">
                <a href="{{ route('login') }}" class="btn btn-n-primary  mt-3">
                    <i class="far fa-arrow-alt-circle-left"></i> Regresar a Inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
