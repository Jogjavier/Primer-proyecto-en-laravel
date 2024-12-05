<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sensores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de Sensores</h1>
        <a href="{{ route('sensores.create') }}" class="btn btn-primary">Agregar Sensor</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nivel de Agua</th>
                    <th>Bomba Asociada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sensores as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->nombre }}</td>
                        <td>{{ $sensor->nivel_agua }}</td>
                        <td>{{ $sensor->bomba ? $sensor->bomba->nombre : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
