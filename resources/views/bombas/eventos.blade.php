<!-- resources/views/bombas/eventos.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Registrados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Eventos Registrados</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sensor</th>
                    <th>Bomba</th>
                    <th>Acción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="evento-list">
                <!-- Los eventos se cargarán aquí -->
            </tbody>
        </table>
    </div>

    <script>
        // Función para cargar los eventos
        async function loadEventos() {
            const response = await fetch('/eventos');
            const eventos = await response.json();

            const eventoList = document.getElementById('evento-list');
            eventoList.innerHTML = '';

            eventos.forEach(evento => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${evento.id}</td>
                    <td>${evento.sensor ? evento.sensor.nombre : 'Manual'}</td>
                    <td>${evento.bomba.nombre}</td>
                    <td>${evento.accion ? 'Encendido' : 'Apagado'}</td>
                    <td>${new Date(evento.created_at).toLocaleString()}</td>
                `;
                eventoList.appendChild(row);
            });
        }

        // Cargar los eventos al iniciar la página
        window.onload = loadEventos;
    </script>
</body>
</html>
