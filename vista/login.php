<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    exit;
}

$error = isset($_GET['error']) ? $_GET['error'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Login - Detalles Con Dulzura</title>

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
    <section class="vh-50" style="background-color: pink;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../asset/custom/fondo Izquierdo.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7.5 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-6 text-black">
                                    <form action="../controlador/usuarioscontroller.php" method="POST">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="../asset/custom/logo.png" alt="logo" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span class="h1 fw-bold mb-0">Detalles Con Dulzura</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesion En Tu Cuenta</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="usuario" name="usuario" class="form-control form-control-lg" required />
                                            <label class="form-label" for="usuario">Usuario</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                            <label class="form-label" for="password">Contraseña</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Acceder</button>
                                        </div>
                                        <?php if ($error): ?>
                                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                                        <?php endif; ?>

                                        <a class="small text-muted" href="Recuperar.php">Olvidaste Tu Contraseña?</a>
                                        <a href="manual.php" class="small text-muted">Manual de Usuario</a>
                                        <p class="mb-5 pb-lg-2" style="color: gray;">Aun no Tienes Cuenta? <a href="registro.php" style="color: gray;">Registrate Aqui</a></p>
                                        <a href="terminos.php" class="small text-muted">Terminos y Condiciones</a>
                                        <a href="politica.php" class="small text-muted">Politica de Privacidad</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>