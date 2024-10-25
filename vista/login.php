<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>login</title>
</head>

<body>
    <section class="vh-50" style="background-color: pink;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Imagen de la izquierda cambiada -->
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="asset/peluche.jpeg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <!-- Formulario -->
                            <div class="col-md-6 col-lg-7.5 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-6 text-black">

                                    <form>
                                        <!-- Logo con imagen -->
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="asset/facebook.png" alt="logo" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesion En Tu Cuenta</h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Correo Electronico</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="button">Acceder</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Olvidaste Tu Contraseña?</a>
                                        <p class="mb-5 pb-lg-2" style="color: gray;">Aun no Tienes Cuenta? <a href="#!" style="color: gray;">Registrate Aqui</a></p>
                                        <a href="#!" class="small text-muted">Terminos y Condiciones</a>
                                        <a href="#!" class="small text-muted">Politica de Privacidad</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
