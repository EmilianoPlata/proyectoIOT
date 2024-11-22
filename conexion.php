<?php
ini_set('display_errors', 1);

function connect_to_database() {
    $host = 'localhost';
    $db = 'pruebas_sensores';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        return $pdo;
    } catch (PDOException $e) {
        die(json_encode(['error' => 'Error al conectar a la base de datos: ' . $e->getMessage()]));
    }
}

function fetch_data($query) {
    $pdo = connect_to_database();
    try {
        $stmt = $pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die(json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]));
    }
}
?>

