@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1 style="font-size: 65px" class="color-n-primary">Asistenci<i class="fas fa-check"></i></h1>
            </div>
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('list.view') }}" class="btn btn-n-primary-2 activeLoad"><i class="fas fa-step-forward"></i> Ver listado de Asistencia</a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{ route('register.post') }}" method="POST" id="formSend">

                        @csrf
                        <div class="form-group pb-3">
                          <label for="exampleInputEmail1" class="text-n-dark my-2"><i class="far fa-check-circle"></i> Programa & Grupo</label>
                            <select class="form-control" name="group" id="">  
                                @php
                                    for ($i=0; $i < count($groups); $i++) { 
                                        echo "<option value='". $groups[$i]["id"] ."' >". $groups[$i]["name"]."</option>" ;
                                    }
                                @endphp
                            </select>
                        </div>

                        <div class="form-group pb-3">
                          <label for="exampleInputPassword1" class="my-2 text-n-dark"><i class="fas fa-user-tag"></i> Docente</label>
                          <input type="text" class="form-control" name="teacher" id="teacher">
                        </div>

                        <div class="form-group pb-3">
                            <label for="exampleInputPassword1" class="my-2 text-n-dark"><i class="far fa-calendar"></i> Fecha de Clase</label>
                            <input type="date" class="form-control" name="date" id="dateClass" >
                        </div>

                        <div class="my-2">
                            <button type="submit" class="btn btn-n-primary activeLoad  mt-3" >
                                <i class="fas fa-angle-double-right"></i> Crear Asistencia
                            </button>
                        </div>
   
                      </form>

                      
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
