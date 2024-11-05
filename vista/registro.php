<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../asset/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    Detalles Con Dulzura
                </a>
                <button class="btn btn-outline-dark" type="submit"onclick="window.location.href='index.php';">
                    <i class="bi bi-house-fill"></i>
                    Inicio
                </button>
            </div>
        </nav>
    </header>

    <section class="vh-50" style="background-color: pink;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            
                            <div class="col-md-6 d-none d-md-block">
                                <img src="../asset/registro.jpg" alt="Formulario de registro" class="img-fluid" style="border-radius: 1rem 0 0 1rem;">
                            </div>

                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 text-black">

                                    <form>
                                        
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="../asset/logo.png" alt="logo" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span class="h1 fw-bold mb-0">Detalles Con Dulzura</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Estamos Encantados de Recibirte</h5>

                                        <div class="mb-2">
                                            <label class="form-label" for="nombres">Nombres</label>
                                            <input type="text" id="nombres" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="apellidos">Apellidos</label>
                                            <input type="text" id="apellidos" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="email">Correo Electrónico</label>
                                            <input type="email" id="email" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="celular">Celular</label>
                                            <input type="tel" id="celular" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="direccion">Dirección</label>
                                            <input type="text" id="direccion" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="pt-1 mb-4 text-center">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Registrar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
