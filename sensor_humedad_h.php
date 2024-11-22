<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Datos Dinámicos</title>
    <style>
        body {text-align: center; background-color: #1f1f1f; }
        .content { margin-left: 250px; padding: 20px;}
        h1 {color: #FFFFFF; }
        canvas {max-width: 1000px;margin: 0 auto;}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include 'menu.php'; // Menú ?>
    <h1>Gráfica de Datos Dinámicos</h1>

    <form method="GET" action="">
        <label for="consulta" style = "color: #FFFFFF">Seleccione el tipo de datos:</label>
        <select name="consulta" id="consulta">
            <option value="temperatura">Temperatura Histórica</option>
            <option value="humedad">Humedad Histórica</option>
            <option value="presion">Presión Histórica</option>
        </select>
        <button type="submit">Generar Gráfica</button>
    </form>

    <canvas id="lineChart" width="200" height="50"></canvas>

    <?php
    include 'conexion.php';

    $tipoConsulta = isset($_GET['consulta']) ? $_GET['consulta'] : 'temperatura';

    $query = "";
    if ($tipoConsulta === 'temperatura') {
        $query = "SELECT fecha, temperatura AS valor FROM temperatura_historica ORDER BY fecha ASC";
    } elseif ($tipoConsulta === 'humedad') {
        $query = "SELECT fecha, humedad AS valor FROM humedad_historica ORDER BY fecha ASC";
    } elseif ($tipoConsulta === 'presion') {
        $query = "SELECT fecha, presion AS valor FROM presion_historica ORDER BY fecha ASC";
    }

    $resultados = fetch_data($query);

    $fechas = array_column($resultados, 'fecha');
    $valores = array_column($resultados, 'valor');
    ?>

    <script>
        const labels = <?php echo json_encode($fechas); ?>;
        const data = <?php echo json_encode($valores); ?>;

        // Crear la gráfica
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, // Fechas en el eje X
                datasets: [{
                    label: 'Datos seleccionados',
                    data: data, // Valores en el eje Y
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#FF5733'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#FFFFFF' }
                    },
                    y: {
                        ticks: { color: '#FFFFFF' }
                    }
                }
            }
        });
    </script>
</body>
</html>
