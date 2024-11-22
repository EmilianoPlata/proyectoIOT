<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Datos Dinámicos</title>
    <style>
        body {
            text-align: center;
            background-color: #1f1f1f;
        }

        .content {
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #FFFFFF;
        }

        .chart-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        @media (min-width: 1200px) {
            .chart-container {
                max-width: 1000px;
                height: 500px;
            }
            canvas {
                max-height: 500px;
            }
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .chart-container {
                max-width: 800px;
            }
        }

        @media (max-width: 767px) {
            .chart-container {
                max-width: 90%;
                margin: 0 auto;
            }

            canvas {
                max-height: 400px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="content">
        <h1>Gráfica de Datos Dinámicos</h1>

        <form method="GET" action="">
            <label for="consulta" style="color: #FFFFFF">Seleccione el tipo de datos:</label>
            <select name="consulta" id="consulta">
                <option value="temperatura" <?php if ($_GET['consulta'] == 'temperatura') echo 'selected'; ?>>Temperatura Histórica</option>
                <option value="humedad" <?php if ($_GET['consulta'] == 'humedad') echo 'selected'; ?>>Humedad Histórica</option>
                <option value="presion" <?php if ($_GET['consulta'] == 'presion') echo 'selected'; ?>>Presión Histórica</option>
            </select>
            <button type="submit">Generar Gráfica</button>
        </form>

        <div class="chart-container">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <?php
    include 'conexion.php';

    // Obtener el tipo de consulta seleccionado
    $tipoConsulta = isset($_GET['consulta']) ? $_GET['consulta'] : 'temperatura';

    // Asignar la consulta SQL según el tipo seleccionado
    switch ($tipoConsulta) {
        case 'temperatura':
            $query = "SELECT timestamp, temperature AS value FROM sensor_p1 ORDER BY timestamp ASC";
            $label = 'Temperatura';
            break;
        case 'humedad':
            $query = "SELECT timestamp, humidity AS value FROM sensor_p1 ORDER BY timestamp ASC";
            $label = 'Humedad';
            break;
        case 'presion':
            $query = "SELECT timestamp, pressure AS value FROM sensor_p1 ORDER BY timestamp ASC";
            $label = 'Presión';
            break;
        default:
            $query = "SELECT timestamp, temperature AS value FROM sensor_p1 ORDER BY timestamp ASC";
            $label = 'Temperatura';
    }

    // Ejecutar la consulta y obtener los datos
    $resultados = fetch_data($query);

    // Obtener las columnas necesarias para la gráfica
    $fechas = array_column($resultados, 'timestamp');
    $valores = array_column($resultados, 'value');
    ?>

    <script>
        // Datos dinámicos desde PHP
        const labels = <?php echo json_encode($fechas); ?>;
        const data = <?php echo json_encode($valores); ?>;

        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '<?php echo $label; ?>',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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

