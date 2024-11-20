<?php

session_start();
require_once '../modelo/conexion.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

$conexion = new Conexion();
$db = $conexion->getConection();

if (!$db) {
    echo json_encode(['error' => 'Error de conexión a la base de datos.']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$query = "SELECT c.compra_id, c.fecha, c.total, c.estado, c.direccion_envio, c.metodo_pago
          FROM compras c
          WHERE c.idusuario = :usuario_id
          ORDER BY c.fecha DESC";
$stmt = $db->prepare($query);
$stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt->execute();

$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($historial);
