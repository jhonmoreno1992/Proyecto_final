<?php
require_once '../modelo/conexion.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Por favor, introduce un correo electrónico válido.";
    } else {
        $conexion = new Conexion();
        $conn = $conexion->getConection();


        $stmt = $conn->prepare("SELECT * FROM registro WHERE correo = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {

            $token = bin2hex(random_bytes(32));


            $resetLink = "https://www.detallescondulzura.com/reset-password.php?token=" . $token;
            $message = "Se ha enviado un correo electrónico a $email con instrucciones para restablecer tu contraseña. 
                        <br>Link simulado: <a href='$resetLink'>$resetLink</a>";
        } else {
            $message = "No se encontró ninguna cuenta con ese correo electrónico.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Recuperar Contraseña</title>
    <style>
        body {
            background-color: pink;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    Detalles Con Dulzura
                </a>
                <button class="btn btn-outline-dark" type="button" onclick="window.location.href='index.php';">
                    <i class="bi bi-house-fill"></i>
                    Inicio
                </button>
            </div>
        </nav>
    </header>
    <section class="vh-100" style="background-color: pink;">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card text-center" style="width: 500px;">
                    <div class="card-header h4 text-white" style="background-color: #FF0066">
                        Recuperar Contraseña
                    </div>
                    <div class="card-body px-4">
                        <?php if ($message): ?>
                            <div class="alert <?php echo strpos($message, 'enviado') !== false ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <p class="card-text py-2">
                            Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.
                        </p>
                        <form method="POST" action="">
                            <div class="form-outline mb-3">
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">Correo Electrónico</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #FF0066">Reestablecer Contraseña</button>
                        </form>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="" href="login.php" style="color: #f1948a;">Acceder</a>
                            <a class="" href="registro.php" style="color: #f1948a;">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>