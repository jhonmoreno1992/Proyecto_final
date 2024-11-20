<?php

session_start();

function inicializarCarrito()
{
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
}

function agregarProducto($id, $nombre, $precio, $cantidad = 1)
{
    inicializarCarrito();
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }
}

function incrementarProducto($id)
{
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    }
}

function disminuirProducto($id)
{
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']--;
        if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
    }
}

function eliminarProducto($id)
{
    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
}

function obtenerCarrito()
{
    inicializarCarrito();
    return $_SESSION['carrito'];
}

function calcularTotal()
{
    $total = 0;
    foreach ($_SESSION['carrito'] as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }
    return $total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add':
            agregarProducto($_POST['product_id'], $_POST['product_name'], $_POST['product_price']);
            $carrito = obtenerCarrito();
            $cartCount = array_sum(array_column($carrito, 'cantidad'));
            echo json_encode(['success' => true, 'cartCount' => $cartCount]);
            exit;
    }
}
