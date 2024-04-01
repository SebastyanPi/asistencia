@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center">
                <h1 style="font-size: 65px" class="color-n-primary">Asistenci<i class="fas fa-check"></i></h1>
            </div>
            <div class="card">
 
                    <table class="table table-bordered table-striped" >
                        <thead >
                          <tr class="bg-n-success">
                            <th scope="col">#</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Code</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                           @foreach ($listAttendece as $key => $value)
                                <tr>
                                    <th scope="row" style="font-size: 12px">{{ ($i+1) }}</th>
                                    <td style="font-size: 12px">{{ $value['group'] }}</td>
                                    <td style="font-size: 12px">{{ $value['teacher'] }}</td>
                                    <td style="font-size: 12px">{{ $value['date'] }}</td>
                                    <td style="font-size: 20px">{{ $value['nullable'] }}</td>
                                    <td><a href="{{ route('edit.view',$value['id']) }}" class="btn btn-n-primary activeLoad"><i class="fas fa-fill"></i></a></td>
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