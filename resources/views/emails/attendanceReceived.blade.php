<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia INTESA</title>
</head>
<body>
     <h1>👋 Asistencia {{ $attendance->date }} - {{ $group["name"] }}</h1>
     <h3>💚 Docente : {{ $attendance->teacher }} </h3>
     <ol>
        @foreach ($studentAttendance as $key => $value)
            <li>⭐ {{ $value["student"] }} - @if ($value["attendance"] == 1) <b>SI</b> @else NO @endif </li>
        @endforeach
     </ol>
</body>
</html>