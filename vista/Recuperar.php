<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Recuperar Contraseña</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../asset/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    Detalles Con Dulzura
                </a>
                <button class="btn btn-outline-dark" type="submit" onclick="window.location.href='index.php';">
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
                        <p class="card-text py-2">
                            Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.
                        </p>
                        <div data-mdb-input-init class="form-outline">
                            <input type="email" id="typeEmail" class="form-control my-3" />
                            <label class="form-label" for="typeEmail">Correo Electronico</label>
                        </div>
                        <a href="#" data-mdb-ripple-init class="btn btn-primary w-100" style="background-color: #FF0066">Reestablecer Contraseña</a>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="" href="login.php" style= "color: #f1948a;">Acceder</a>
                            <a class="" href="registro.php" style= "color: #f1948a;">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>