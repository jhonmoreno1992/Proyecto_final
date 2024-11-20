<?php

session_start();
require_once '../modelo/conexion.php';
require_once 'carrito_funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $db = $conexion->getConection();

    if (!$db) {
        die(json_encode(['success' => false, 'message' => "Error de conexión a la base de datos."]));
    }

    if (!isset($_SESSION['usuario_id'])) {
        die(json_encode(['success' => false, 'message' => "Usuario no autenticado"]));
    }

    $usuario_id = $_SESSION['usuario_id'];
    $direccion_envio = $_POST['direccion_envio'];
    $metodo_pago = $_POST['metodo_pago'];
    $carrito = obtenerCarrito();
    $total = calcularTotal();

    if (empty($carrito)) {
        die(json_encode(['success' => false, 'message' => "El carrito está vacío"]));
    }

    error_log("Usuario ID: " . $usuario_id);
    error_log("Dirección de envío: " . $direccion_envio);
    error_log("Método de pago: " . $metodo_pago);
    error_log("Total: " . $total);

    try {
        $db->beginTransaction();

        $check_user = "SELECT idusuario FROM usuario WHERE idusuario = :usuario_id";
        $stmt_check = $db->prepare($check_user);
        $stmt_check->execute([':usuario_id' => $usuario_id]);
        if ($stmt_check->rowCount() == 0) {
            throw new Exception("El usuario con ID $usuario_id no existe en la tabla usuario.");
        }

        $sql_compra = "INSERT INTO compras (idusuario, fecha, total, estado, direccion_envio, metodo_pago) 
                       VALUES (:usuario_id, NOW(), :total, 'pendiente', :direccion_envio, :metodo_pago)";
        $stmt_compra = $db->prepare($sql_compra);
        $stmt_compra->execute([
            ':usuario_id' => $usuario_id,
            ':total' => $total,
            ':direccion_envio' => $direccion_envio,
            ':metodo_pago' => $metodo_pago
        ]);

        $compra_id = $db->lastInsertId();

        $sql_detalle = "INSERT INTO detalles_compra (compra_id, idproducto, cantidad, precio_unitario, subtotal) 
                        VALUES (:compra_id, :idproducto, :cantidad, :precio_unitario, :subtotal)";
        $stmt_detalle = $db->prepare($sql_detalle);

        foreach ($carrito as $producto_id => $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $stmt_detalle->execute([
                ':compra_id' => $compra_id,
                ':idproducto' => $producto_id,
                ':cantidad' => $item['cantidad'],
                ':precio_unitario' => $item['precio'],
                ':subtotal' => $subtotal
            ]);
        }

        $db->commit();

        $_SESSION['carrito'] = [];

        echo json_encode(['success' => true, 'message' => 'Compra procesada con éxito']);
    } catch (Exception $e) {
        $db->rollBack();
        error_log("Error en procesar_compra.php: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Error al procesar la compra: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido']);
}
