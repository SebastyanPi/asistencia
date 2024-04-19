<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('header')</title>
</head>
<body>
    <style>

@font-face{
  font-family: "Feather Bold";
  src: url("../fonts/feather.ttf");
  font-weight:normal;
  font-style:normal;
  font-display:swap;
}
.codeAsistencia {
  font-family: Arial, Helvetica, sans-serif !important;
  font-weight: bold;
}

        table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
  font-size: 11px;
}

table th {
  font-size: 12px;
  text-transform: uppercase;
}

/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

.bg-n-green-suave{
    background-color: #ddefde;
}

.bg-n-green-fuerte{
    background-color: #bbeebe;
}

.bg-n-danger{
    background-color: #ef84a1;
}

.bg-n-success{
    background-color: #58cc02;
}

.font-14{
    font-size: 12px;
}
.content-header{
    width: 100%;
}
.content-header div{
    display: inline;
}
.bg-n-gray{
    background-color: #ccc;
}

.mycheck {
    appearance: none;
  }

  .mycheck {
    cursor: pointer;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
    width: 38px;
    height: 38px;
    appearance: none;
    border: 5px solid #4b4b4b;
    border-radius: 50%;
}

.mycheck:checked {
    background-color: #58cc02;
  }

  .mycheck:focus {
    border-color: rgb(80, 67, 250);
  } 
  

    </style>

    <header>
        <div class="content-header">
            <div>
                <img style="width: 80px" src="https://campus.institutointesa.edu.co/img/intesa.png" alt="">
            </div>
        </div>
    </header>
    @yield('content')
</body>
</html>