<?php
include 'conexion.php';
if($_GET) {
    try {

        $pdo = connect_to_database();

        //datos humedad
        $id_humedad = $_GET['id_humedad'];
        $dato_humedad = $_GET['dato_humedad'];
        $id_sensor_humedad = $_GET['id_sensor_humedad'];
        //datos temperatura
        $id_temperatura = $_GET['id_temperatura'];
        $dato_temperatura = $_GET['dato_temperatura'];
        $id_sensor_temperatura = $_GET['id_sensor_temperatura'];
        //datos presion
        $id_presion = $_GET['id_presion'];
        $dato_presion = $_GET['dato_presion'];
        $id_sensor_presion = $_GET['id_sensor_presion'];
        //datos calidad aire
        $id_calidadAire = $_GET['id_calidadAire'];
        $dato_calidadAire = $_GET['dato_calidadAire'];
        $id_sensor_calidadAire = $_GET['id_sensor_calidadAire']; 
        //datos co2
        $id_co2 = $_GET['id_co2'];
        $dato_co2 = $_GET['dato_co2'];
        $id_sensor_co2 = $_GET['id_sensor_co2'];

        //insertar datos en la tabla humedad
        $sql_agregar_humedad = 'INSERT INTO humedad(id_humedad, dato_humedad, id_sensor)
        VALUES (?,?,?)';
        $agregar_humedad = $pdo ->prepare($sql_agregar_humedad);
        $resultado_humedad = $agregar_humedad->execute(array($id_humedad, $dato_humedad, $id_sensor_humedad));

        //insertar datos en la tabla temperatura
        $sql_agregar_temperatura = 'INSERT INTO temperatura(id_temperatura, dato_temperatura, id_sensor)
        VALUES (?,?,?)';
        $agregar_temperatura = $pdo ->prepare($sql_agregar_temperatura);
        $resultado_temperatura = $agregar_temperatura->execute(array($id_temperatura, $dato_temperatura, $id_sensor_temperatura));

        //insertar datos en la tabla presion
        $sql_agregar_presion = 'INSERT INTO presion(id_presion, dato_presion, id_sensor)
        VALUES (?,?,?)';
        $agregar_presion = $pdo ->prepare($sql_agregar_presion);
        $resultado_presion = $agregar_presion->execute(array($id_presion, $dato_presion, $id_sensor_presion));

        //insertar datos en la tabla de calidadaire
        $sql_agregar_calidadAire = 'INSERT INTO calidadaire(id_calidadAire, dato_calidadAire, id_sensor)
        VALUES(?,?,?)';
        $agregar_calidadAire = $pdo ->prepare($sql_agregar_calidadAire);
        $resultado_calidadAire = $agregar_calidadAire->execute(array($id_calidadAire, $dato_calidadAire, $id_sensor_calidadAire));

        //insertar datos en la tabla co2
        $sql_agregar_co2 = 'INSERT INTO co2(id_co2, dato_co2, id_sensor)
        VALUES(?,?,?)';
        $agregar_co2 = $pdo ->prepare($sql_agregar_co2);
        $resultado_co2 = $agregar_co2->execute(array($id_co2, $dato_co2, $id_sensor_co2));

        if($resultado_humedad && $resultado_temperatura
        && $resultado_presion && $resultado_calidadAire && $resultado_co2 == true) {
            $agregar_humedad = null;
            $agregar_temperatura = null;
            $agregar_presion = null;
            $agregar_calidadAire = null;
            $agregar_co2 = null;
            $pdo = null;
            echo 'Datos guardado correctamente';
        } else {
            echo 'Error al insertar: ' . $resultado_temperatura;
        }
    } catch (Exception $e) {
        print($e->getMessage());
        die();
    }
} else {
    echo 'No hay método GET con los parámetros necesarios';
}

?>