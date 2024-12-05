<!-- resources/views/bombas/check.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar Nivel de Agua</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Comprobar Nivel de Agua</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nivel de Agua</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="sensor-list">
                <!-- Los sensores se cargarán aquí -->
            </tbody>
        </table>
    </div>

    <script>
        // Función para cargar los sensores
        async function loadSensores() {
            const response = await fetch('/sensores'); // Cambia esta ruta si es necesario
            const sensores = await response.json();

            const sensorList = document.getElementById('sensor-list');
            sensorList.innerHTML = '';

            sensores.forEach(sensor => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${sensor.id}</td>
                    <td>${sensor.nombre}</td>
                    <td>${sensor.nivel_agua}</td>
                    <td>
                        <button class="btn btn-info" onclick="checkWaterLevel(${sensor.id})">
                            Comprobar
                        </button>
                    </td>
                `;
                sensorList.appendChild(row);
            });
        }

        // Función para comprobar el nivel de agua de un sensor
        async function checkWaterLevel(sensorId) {
            await fetch(`/sensor/check/${sensorId}`);
            alert('Nivel de agua verificado.'); // Puedes mejorar el manejo de la respuesta
        }

        // Cargar los sensores al iniciar la página
        window.onload = loadSensores;
    </script>
</body>
</html>
