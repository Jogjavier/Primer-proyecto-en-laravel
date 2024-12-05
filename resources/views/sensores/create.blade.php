<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sensor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agregar Sensor</h1>
        <form action="{{ route('sensores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nivel_agua">Nivel de Agua:</label>
                <input type="number" name="nivel_agua" id="nivel_agua" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bomba_id">Bomba Asociada:</label>
                <select name="bomba_id" id="bomba_id" class="form-control" required>
                    @foreach($bombas as $bomba)
                        <option value="{{ $bomba->id }}">{{ $bomba->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
</body>
</html>
