<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Componentes</title>
    <style>
        body {
            text-align: center; 
            background-color: #1f1f1f; 
            font-family: Arial, sans-serif;
            color: #FFFFFF;
            margin: 0;
        }

        h1, h3 {
            margin-top: 20px;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 0 auto;
            padding: 30px;
            width: 90%; /* Ajusta automáticamente el ancho */
        }

        .gallery-item {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .gallery-item p {
            margin: 10px 0;
            font-size: 16px;
        }

        .gallery-item a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .gallery-item a:hover {
            color: #723185;
        }

        @media (min-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            h3 {
                font-size: 1.2rem;
            }

            .gallery-container {
                width: 80%;
                margin-left: 20%
            }

            .gallery-item p {
                font-size: 18px;
            }

            .gallery-item a {
                font-size: 16px;
            }
        }

        @media (min-width: 1200px) {
            .gallery-container {
                width: 70%; /* Más estrecho en pantallas grandes */
            }

            .gallery-item {
                padding: 30px;
            }

            .gallery-item p {
                font-size: 20px;
            }

            .gallery-item a {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; // Incluir el menú en la parte superior ?>
    <h1>Galería de Componentes</h1>
    <h3>Proyecto desarrollado por Emiliano Plata Cardona A01752759 y Daiana Andrea Armenta Maya A01751408</h3>

    <div class="gallery-container">
        <div class="gallery-item">
            <img src="bmp280.png" alt="BMP280">
            <p>Sensor de presión, temperatura y humedad (Solo se usará para presión).</p>
            <a href="https://www.bosch-sensortec.com/media/boschsensortec/downloads/datasheets/bst-bmp280-ds001.pdf" target="_blank">Manual BMP280</a>
        </div>

        <!-- Componente 2 -->
        <div class="gallery-item">
            <img src="dht22.png" alt="DHT22">
            <p>Sensor de temperatura y humedad.</p>
            <a href="https://www.sparkfun.com/datasheets/Sensors/Temperature/DHT22.pdf" target="_blank">Manual DHT22</a>
        </div>

        <div class="gallery-item">
            <img src="MQ135.png" alt="MQ135">
            <p>Sensor de CO2 y calidad del aire.</p>
            <a href="https://www.winsen-sensor.com/d/files/PDF/Semiconductor%20Gas%20Sensor/MQ135%20(Ver1.4)%20-%20Manual.pdf" target="_blank">Manual MQ135</a>
        </div>

        <div class="gallery-item">
            <img src="ESP32.png" alt="ESP32">
            <p>Placa usada para conectar los sensores.</p>
            <a href="https://www.espressif.com/sites/default/files/documentation/esp32_technical_reference_manual_en.pdf" target="_blank">Manual ESP32</a>
        </div>
    </div>
</body>
</html>
