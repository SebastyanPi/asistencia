@extends('layouts.app')

@section('content')
<div class="container ">

    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="row">
                
                @php
                    if(isset($success)){
                        echo '<div class="alert alert-danger" role="alert">
                            Eliminado Correctamente!
                        </div> ';
                    }
                @endphp
                    


                <div class="card-body text-center">

                    <h1 style="font-size: 65px" class="color-n-primary">Asistenci<i class="fas fa-check"></i></h1>
                        <h4>👋Ingresa el <b> codigo de asistencia </b> dado por el administrador</h4>
                        <form method="POST" action="{{ route('code.post') }}">
                            @csrf
    
                            <div class="row mb-3 mt-2">
                                <div class="col-md-12">
                             
                                    <input type="text" name="code" class="input-n" aria-describedby="basic-addon1" placeholder="hty">
                                </div>
                                <div class="col-md">
                                    <button type="submit" class="btn btn-n-primary activeLoad  mt-3">
                                        <i class="fas fa-angle-double-right"></i> Ingresar
                                    </button>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                 
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
