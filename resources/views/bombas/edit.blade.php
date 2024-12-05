<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Editar Bomba</h1>
        <form action="{{ route('bombas.update', $bomba->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la Bomba:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $bomba->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="1" {{ $bomba->estado ? 'selected' : '' }}>Encendida</option>
                    <option value="0" {{ !$bomba->estado ? 'selected' : '' }}>Apagada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen (opcional):</label>
                @if($bomba->imagen)
                    <p>Imagen actual:</p>
                    <img src="{{ Storage::url($bomba->imagen) }}" alt="Imagen actual" class="img-thumbnail" width="150">
                @endif
                <input type="file" name="imagen" id="imagen" class="form-control mt-2">
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="{{ route('bombas.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>
