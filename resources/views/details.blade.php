@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center">
                <h1 style="font-size: 65px" class="color-n-primary">Asistenci<i class="fas fa-check"></i></h1>
            </div>
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <h1 style="font-size: 80px">{{ $item->codeNullable }}</h1>
                            <samll> <span class="parch-text p-2"> <i class="fas fa-users"></i></span> {{ $typeGroup['name'] }} </p>
                            <p> <span class="parch-text p-2"> <i class="fas fa-chalkboard-teacher"></i></span> {{ $item->teacher }} </p>
                            <p> <span class="parch-text p-2"> <i class="fas fa-clock"></i></span> {{ $item->date }} </p>
                        </div>
                        <div class="col-md-4 bg-n-primary">
                            <div class="w-100 h-100 text-center" style="width: 100%">
                                <img src="{{ env('APP_URL') }}qrcodes/{{ $item->id }}.svg" width="70%" height="70%" alt=""> <br>
                                <small> Guarda este codigo para que puedas revisar la asistencia cuando quieras.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
       
                    <table class="table table-bordered table-striped" >
                        <thead >
                          <tr class="bg-n-success">
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col" class="text-center" >¿Asistió?</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($listStudent as $key => $value)

                                <tr>
                                    <th scope="row">{{ ($i+1) }}</th>
                                    <td>{{ $value['student'] }}</td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="mycheck" type="checkbox" disabled @if ($value['attendance'] == "1")
                                                checked
                                                @endif >
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    
                    
            <div class="my-1">
                <a href="{{ route('login') }}" class="btn btn-n-primary  mt-3">
                    <i class="far fa-arrow-alt-circle-left"></i> Regresar a Inicio
                </a>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
