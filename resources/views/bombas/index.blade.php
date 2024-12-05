<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bombas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Bombas</h1>
        <a href="{{ route('bombas.create') }}" class="btn btn-primary mb-4">Agregar Bomba</a>
        <form action="{{ route('bombas.search') }}" method="GET" class="form-inline mb-4">
            <input type="text" name="query" class="form-control mr-2" placeholder="Buscar bombas...">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <!-- Botón para generar el PDF -->
        <a href="{{ route('bombas.pdf') }}" class="btn btn-success mb-4">Generar PDF</a>

        <div class="row">
            @foreach($bombas as $bomba)
                <div class="col-md-4">
                    <div class="card text-center" style="width: 18rem; margin-top: 20px;">
                        <img 
                            style="height: 150px; width: 150px; background-color: #EFEFEF; margin: 20px;" 
                            class="card-img-top rounded-circle mx-auto d-block" 
                            src="{{ $bomba->imagen ? Storage::url($bomba->imagen) : asset('images/default-avatar.png') }}" 
                            alt="{{ $bomba->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bomba->nombre }}</h5>
                            <p class="card-text">
                                Estado: 
                                <span class="badge {{ $bomba->estado ? 'badge-success' : 'badge-danger' }}">
                                    {{ $bomba->estado ? 'Encendida' : 'Apagada' }}
                                </span>
                            </p>
                            <a href="{{ route('bombas.edit', $bomba->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('bombas.destroy', $bomba->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta bomba?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
