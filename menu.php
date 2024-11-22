<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Lateral Izquierdo</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            position: fixed; 
            top: 0;
            left: 0;
            height: 100vh; 
            width: 250px; 
            background-color: #333;
            padding-top: 20px; 
            display: flex;
            flex-direction: column; 
            align-items: flex-start; 
            overflow-y: auto; /* Para manejar scroll en pantallas pequeñas */
        }

        .menu-item {
            display: block; 
            margin: 20px 20px;
            font-size: 16px; 
            color: #FFFFFF;
            text-decoration: none;
            cursor: pointer;
        }

        .menu-item:hover {
            color: #723185;
        }

        .menu-item + .submenu {
            display: none; 
            flex-direction: column;
            margin-left: 20px;
        }

        .submenu a {
            margin: 10px 0;
            font-size: 14px;
            color: #a7a7a7; 
            text-decoration: none;
        }

        .submenu a:hover {
            color: #ffcc66; 
        }

        .menu-item.open + .submenu {
            display: flex; 
        }

        @media screen and (max-width: 768px) {
            nav {
                width: 200px; /* Reduce el ancho del menú */
            }

            .menu-item {
                font-size: 14px; /* Reduce el tamaño del texto */
            }

            .submenu a {
                font-size: 12px; /* Reduce el tamaño de las subopciones */
            }
        }

        @media screen and (max-width: 480px) {
            nav {
                width: 100%; /* Menú ocupará todo el ancho en móviles */
                height: auto; /* Se ajusta al contenido */
                position: relative; /* Cambia la posición a relativa */
            }

            .menu-item {
                margin: 10px 10px; /* Reduce los márgenes */
                font-size: 14px;
            }

            .submenu a {
                font-size: 12px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    item.classList.toggle('open');

                    menuItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('open');
                        }
                    });
                });
            });
        });
    </script>
</head>
<body>
    <nav>
        <a href="home.php" class="menu-item">Inicio</a>
        <a href="componentes.php" class="menu-item">Componentes</a>
        <a href="datos_historicos.php" class="menu-item">Datos Históricos</a>
        
        <!-- Submenú para Sensor de Temperatura -->
        <a class="menu-item">Sensor de Temperatura</a>
        <div class="submenu">
            <a href="sensor_temperatura_actual.php">Datos Actuales</a>
            <a href="sensor_temperatura_hist.php">Histórico</a>
        </div>

        <!-- Submenú para Sensor de Humedad -->
        <a class="menu-item">Sensor de Humedad</a>
        <div class="submenu">
            <a href="sensor_humedad_a.php">Datos Actuales</a>
            <a href="sensor_humedad_h.php">Histórico</a>
        </div>

        <!-- Submenú para Sensor CO2 -->
        <a class="menu-item">Sensor CO2</a>
        <div class="submenu">
            <a href="sensor_co2_actual.php">Datos Actuales</a>
            <a href="sensor_co2_hist.php">Histórico</a>
        </div>

        <!-- Submenú para Sensor de Calidad del Aire -->
        <a class="menu-item">Sensor de Calidad del Aire</a>
        <div class="submenu">
            <a href="sensor_calidad_aire_actual.php">Datos Actuales</a>
            <a href="sensor_calidad_aire_hist.php">Histórico</a>
        </div>

        <a href="configuracion.php" class="menu-item">Configuración</a>
    </nav>
</body>
</html>
