<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estación Meteorológica</title>
    <style>
        /* Estilos generales */
        body {
            text-align: center;
            background-color: #1f1f1f;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Contenedor de lecturas */
        .lecturas-container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #181818;
            color: #a7cdc5;
            width: 90%; /* Predeterminado para pantallas pequeñas */
            max-width: 450px; /* Límite en pantallas grandes */
        }

        /* Contenedor de texto posicionado */
        .texto-posicionado {
            margin: 20px auto;
            color: #FFFFFF;
            font-size: 16px;
            text-align: left;
            width: 90%; /* Ocupa el 90% del ancho disponible */
            max-width: 650px; /* Máximo en pantallas grandes */
        }

        .texto-posicionado img {
            display: block;
            width: 100%; /* Se ajusta al ancho disponible */
            max-width: 300px; /* Límite para pantallas grandes */
            height: auto;
            margin: 10px auto;
        }

        h1, h2 {
            color: #FFFFFF;
        }

        /* Estilos para enlaces del menú */
        .menu-item {
            display: block;
            margin: 20px auto;
            font-size: 18px;
            color: #FFFFFF;
            text-decoration: none;
        }

        .menu-item:hover {
            color: #723185;
        }

        /* Media Queries: Ajustes específicos */
        @media (min-width: 768px) {
            .lecturas-container {
                width: 50%; /* Ocupa la mitad de la pantalla en dispositivos grandes */
            }

            .texto-posicionado {
                font-size: 18px; /* Texto más grande en pantallas grandes */
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .menu-item {
                font-size: 20px;
            }
        }

        @media (min-width: 1200px) {
            .lecturas-container {
                width: 30%; /* Más estrecho en pantallas grandes */
            }

            .texto-posicionado {
                font-size: 20px; /* Texto más grande aún en pantallas muy grandes */
            }
        }
    </style>
    <script>
        // Recarga automática cada 10 segundos
        setTimeout(function() {
            location.reload();
        }, 10000);
    </script>
</head>
<body>

    <?php include 'menu.php'; // Incluir el menú ?>
    <h1>Datos de la Estación Meteorológica</h1>
    <div class="texto-posicionado">
        <p>Proyecto desarrollado por Emiliano Plata Cardona A01752759 y Daiana Andrea Armenta Maya A01751408</p>
        <p>En esta página se muestran los datos más recientes de la estación meteorológica</p>
        <img src="WhatsApp Image 2024-11-13 at 12.26.01 AM.jpeg" alt="Estación Meteorológica">
        <p>La imagen en la parte superior muestra cómo se ve la estación meteorológica</p>
        <p>Si quieres ver los componentes que se usaron, puedes checarlo en la sección de componentes o en el enlace de abajo:</p>
        <a href="componentes.php" class="menu-item">Componentes</a>
    </div>
    <div class="lecturas-container">
        <h2>Última Lectura</h2>
        <?php
        include 'conexion.php'; // Incluir el archivo de conexión

        try {
            $pdo = connect_to_database(); // Llamar a la función para obtener la conexión

            $sql = "SELECT temperature, humidity, pressure, timestamp FROM sensor_p1 ORDER BY ID DESC LIMIT 1";
            $result = $pdo->query($sql);

            if ($result->rowCount() > 0) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<p>Temperatura: " . $row['temperature'] . " °C</p>";
                echo "<p>Humedad: " . $row['humidity'] . " %</p>";
                echo "<p>Presión: " . $row['pressure'] . " hPa</p>";
                echo "<p>Calidad del Aire: " . $row['pressure'] . "</p>";
                echo "<p>CO2: " . $row['timestamp'] . "</p>";
                echo "<p>Fecha y Hora: " . $row['timestamp'] . "</p>";
            } else {
                echo '<p style="color: red;">No hay datos</p>';
            }

            $pdo = null; // Cerrar conexión
        } catch (Exception $e) {
            echo '<p style="color: red;">Error: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

</body>
</html>

