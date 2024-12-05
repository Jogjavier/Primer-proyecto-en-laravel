<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agregar Bomba</h1>
        <form action="{{ route('bombas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Bomba:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="1">Encendida</option>
                    <option value="0">Apagada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen (opcional):</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('bombas.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>



