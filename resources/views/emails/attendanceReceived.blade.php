<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia INTESA</title>
</head>
<body>
     <h1>Asistencia {{ $attendance->date }}} - {{ $group->name }}</h1>
     <ol>
        @foreach ($studentAttendance as $item)
            <li>{{ $item->student }} - @if ($attendance == 0) SI @else NO @endif </li>
        @endforeach
     </ol>
</body>
</html>