@extends('layouts.pdf')

@section('header')
    ASISTENCIA
@endsection

@section('content')
<div style="display:flex; align-items:center;">
    <img style="text-align: center !important;margin-left:-25px;" width="50%" src="https://asistencia.institutointesa.edu.co/img/asistencia.png" alt="">
</div>

<div style="margin-top:-30px;">
    <br>
    <span style="font-size:13px">Nombre del Programa : <b>{{ $typeGroup['name'] }} </b></span> <br>
    <span style="font-size:13px">Docente : <b>{{ $item->teacher }} </b></span><br>
    <span style="font-size:13px">Codigo : <b class="codeAsistencia" style="font-size:20px; color:#458f0c !important;" >{{ $item->codeNullable }} </b></span><br>
    <span style="font-size:13px">Fecha : <b>{{ $item->date }} </b></span><br>
    <br>
</div>
    <table>
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
                            @if ($value['attendance'] == "1")
                                <span class="codeAsistencia" style="font-size:12px; color:#458f0c !important;font-weight:bold; border:1px solid #458f0c;padding:5px;border-radius:50%;">Si</span>
                            @else
                                <span>No</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection