<?php
session_start();
require_once '../modelo/conexion.php';
require_once '../modelo/usuario.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$conexion = new Conexion();
$db = $conexion->getConection();
$usuario = new Usuario($db);

$userData = $usuario->obtenerRegistroPorId($_SESSION['usuario_id']);

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'cedula' => $_POST['cedula'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'usuario' => $_POST['usuario'],
        'password' => $_POST['password'],
        'confirmpassword' => $_POST['confirmpassword']
    ];


    if ($datos['password'] !== $datos['confirmpassword']) {
        $mensaje = 'Las contraseñas no coinciden.';
    } else {

        if ($usuario->actualizarRegistro($_SESSION['usuario_id'], $datos)) {
            $mensaje = 'Perfil actualizado con éxito.';
            $userData = $usuario->obtenerRegistroPorId($_SESSION['usuario_id']);
        } else {
            $mensaje = 'Error al actualizar el perfil.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Detalles Con Dulzura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/styleperfil.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">
                <img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                Detalles Con Dulzura
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                </ul>
                <div class="d-flex">

                    <button class="btn btn-outline-dark" type="button" onclick="window.history.back();">
                        <i class="bi bi-chevron-left"></i>
                        Volver
                    </button>

                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Perfil de Usuario</h1>
        <?php if ($mensaje): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
        <div class="form-container mx-auto">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($userData['nombre']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($userData['apellido']); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo htmlspecialchars($userData['cedula']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($userData['direccion']); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($userData['telefono']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($userData['correo']); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo htmlspecialchars($userData['usuario']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($userData['password']); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="confirmpassword" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" value="<?php echo htmlspecialchars($userData['confirmpassword']); ?>" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="dashboard.php" class="btn btn-secondary">Volver al Dashboard</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>