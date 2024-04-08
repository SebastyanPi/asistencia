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
                        <div class="col-12 text-center">
                            <h1 style="font-size: 80px">{{ $item->code }}</h1>
                            <p> <span class="parch-text p-2"> <i class="fas fa-users"></i></span> {{ $typeGroup['name'] }} </p>
                            <p> <span class="parch-text p-2"> <i class="fas fa-chalkboard-teacher"></i></span> {{ $item->teacher }} </p>
                            <p> <span class="parch-text p-2"> <i class="fas fa-clock"></i></span> {{ $item->date }} </p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('complete.attendance.post') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="id_assist" value="{{  $item->id   }}" >
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
                              for ($i=0; $i < count($list); $i++) { 
                                    echo '
                                    <tr>
                                        <th scope="row">'.($i+1).'</th>
                                        <td>'.$list[$i]['student'].'</td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="mycheck" type="checkbox" name="'.$list[$i]['id'].'" value="'.$list[$i]['id'].'" >
                                            </div>
                                        </td>
                                    </tr>
                                    ';
                              }
                          @endphp
                        </tbody>
                    </table>
    
                    <div class="my-1">
                        <input type="email" class="form-control d-none" placeholder="Escribe el Email donde se enviará la asistencia." name="email" >
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-n-primary  mt-3">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>

                    
                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de CONFIRMAR la asistencia?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        👀Si confimas la asistencia ya no podras editarla.
                    </div>
                    <div class="modal-footer">

                    <button type="submit" class="btn btn-n-primary activeLoad " id="loadVent" >Si, Guardar!</button>
                    </div>
                </div>
                </div>
            </div>
                </form>

            </div>
        </div>
    </div>



</div>
@endsection
