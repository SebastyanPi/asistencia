<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INTESA - Asistencia</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://db.onlinewebfonts.com/c/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold" rel="stylesheet">
    <link rel="stylesheet" href="{{ env('APP_URL') }}css/app.css">
     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
     <meta property="og:image" content="https://campus.institutointesa.edu.co/img/intesa.png">
</head>
<body>
    <div class="show_loader " id="show_loader">
        <span class="loader"></span>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-n-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand color-n-primary" href="{{ url('/') }}">
                    <img src="{{ env('APP_URL') }}img/Recurso.png" width="80px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-n-dark" href="{{ route('login') }}"><i class="fas fa-check-double"></i> Control de Asistencia</i></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link text-n-dark" href="{{ route('register') }}"><i class="fas fa-user"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function showLoad(){
            document.getElementById('show_loader').classList.remove("d-none");
            setTimeout(() => {
                document.getElementById('show_loader').classList.add("d-none");
            }, 1000);
        }
        showLoad();

       
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
     $(".activeLoad").click(function(){
            $(".btn-close").click();
            document.getElementById('show_loader').classList.remove("d-none");
        });

    $("#loadVent").click(function(){
            $(".btn-close").click();
            document.getElementById('show_loader').classList.remove("d-none");
        });
  
  
    $("#formSend").submit(function(e){
        const val = $("#dateClass").val();
        const teacher = $("#teacher").val();
        if(val == ""){
            document.getElementById('show_loader').classList.add("d-none");
            e.preventDefault();
        }
        if(teacher == ""){
            document.getElementById('show_loader').classList.add("d-none");
            e.preventDefault();
        }
    });

</script>
</body>
</html>
