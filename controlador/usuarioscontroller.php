<?php 
session_start();
require_once '../modelo/conexion.php';
require_once '../modelo/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $db = $conexion->getConection();
    
    if (!$db) {
        die("Error de conexión a la base de datos.");
    }

    $usuario = new Usuario($db);

    $usuario->usuario = $_POST['usuario'];
    $usuario->password = $_POST['password'];
    
    $resultado = $usuario->validarUsuario();

    if ($resultado) {
        $_SESSION['usuario'] = $resultado['usuario'];
        header("Location: ../vista/dashboard.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrecta";
        header("Location: ../vista/login.php?error=" . urlencode($error));
        exit;
    }
}