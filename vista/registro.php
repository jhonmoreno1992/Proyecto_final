<?php
require_once '../modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $conn = $conexion->getConection();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden";
    } elseif (!isset($_POST['terminos']) || !isset($_POST['privacidad'])) {
        $error = "Debes aceptar los términos y condiciones y la política de privacidad";
    } else {
        $sql = "INSERT INTO registro (nombre, apellido, cedula, direccion, telefono, correo, usuario, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $apellido, $cedula, $direccion, $telefono, $correo, $usuario, $password]);

        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Detalles Con Dulzura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: pink;
        }

        .form-check-input:checked {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }
    </style>
    <script>
        window.addEventListener('message', function(event) {
            if (event.data === 'terms_accepted') {
                document.getElementById('terminos').checked = true;
            } else if (event.data === 'privacy_accepted') {
                document.getElementById('privacidad').checked = true;
            }
        });

        function openTerms() {
            window.open('terminos.php', 'TerminosCondiciones', 'width=800,height=600');
        }

        function openPrivacy() {
            window.open('politica.php', 'PoliticaPrivacidad', 'width=800,height=600');
        }
    </script>
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="btn btn-outline-dark">
                            <i class="bi-house-fill me-1"></i>
                            Inicio
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="row g-0">
                        <div class="col-md-5 d-none d-md-block">
                            <img src="../asset/custom/registro.jpg" alt="Registro" class="img-fluid h-100 object-fit-cover" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4">Registro de Usuario</h2>
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST" id="registroForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cedula" class="form-label">Cédula</label>
                                            <input type="text" class="form-control" id="cedula" name="cedula" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="correo" name="correo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="usuario" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="terminos" name="terminos" required>
                                        <label class="form-check-label" for="terminos">Acepto los <a href="#" onclick="openTerms(); return false;">Términos y Condiciones</a></label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacidad" name="privacidad" required>
                                        <label class="form-check-label" for="privacidad">Acepto la <a href="#" onclick="openPrivacy(); return false;">Política de Privacidad</a></label>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5" style="background:url('../asset/custom/imagen2.jpg')">
        <div class="container">
            <p class="m-0 text-center text-black">Copyright &copy; Detalles con Dulzura 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validarFormulario() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password != confirm_password) {
                alert("Las contraseñas no coinciden");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>