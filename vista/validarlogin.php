<?php
// Inicio de sesión
session_start();

// Verificación de usuario y contraseña
if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin') {
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../index.php");
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>