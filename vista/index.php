<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/styleindex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>DETALLES CON DULZURA</title>    
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Bienvenidos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Nosotros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Amor</a></li>
                            <li><a class="dropdown-item" href="#!">Amistad</a></li>
                            <li><a class="dropdown-item" href="#!">Cumpleaños</a></li>
                            <li><a class="dropdown-item" href="#!">Temporadas</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <button class="btn btn-outline-dark" type="button" onclick="window.location.href='login.php';">
                                <i class="bi bi-person-circle"></i>
                                Login
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-dark" type="button" onclick="window.location.href='carrito.php';">
                                <i class="bi-cart-fill me-1"></i> 
                                Carrito
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-globe"></i> ES</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-dark py-5" style="background:url('../asset/imagen2.jpg')">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h1 class="display-4 fw-bolder">DETALLES CON DULZURA</h1>
                <p class="lead fw-normal text-black">Detalles para todas las ocasiones</p>
            </div>
        </div>
    </header>

    <section class="py-5" style="background-color:pink;">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="../asset/producto1.jpg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Peluches</h5>

                                $15.000 - $50.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Opciones</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="../asset/producto2.jpg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Flores</h5>

                                $4.000 - $50.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Opciones</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Oferta</div>

                        <img class="card-img-top" src="../asset/producto3.jpg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Chocolates</h5>

                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                <span class="text-muted text-decoration-line-through">$10.000</span>
                                $8.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Opciones</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Oferta</div>

                        <img class="card-img-top" src="../asset/ancheta.jpeg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Anchetas de Temporada</h5>

                                <span class="text-muted text-decoration-line-through">$50.000</span>
                                $45.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Opciones</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="../asset/peluche.jpeg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Destacado</h5>
                                <h6>Peluche Charmander</h6>

                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                $25.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Añadir</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Oferta</div>

                        <img class="card-img-top" src="../asset/rosas.jpg" alt="Caja de Rosas" />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Caja de Rosas</h5>

                                <span class="text-muted text-decoration-line-through">$30.000</span>
                                $25.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Añadir</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Oferta</div>

                        <img class="card-img-top" src="../asset/combo.webp" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Combo</h5>
                                <h6>Vino/Chocolates/Rosas</h6>

                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                <span class="text-muted text-decoration-line-through">$80.000</span>
                                $70.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Añadir</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="../asset/desayuno sorpresa.jpg" alt="..." />

                        <div class="card-body p-4 lila-background">
                            <div class="text-center">

                                <h5 class="fw-bolder">Destacado</h5>
                                <h6>Desayuno Sorpresa Princesa</h6>

                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                $30.000
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Añadir</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5" style="background:url('../asset/imagen2.jpg')">
        <div class="container">
            <p class="m-0 text-center text-black">Copyright &copy; Detalles con Dulzura 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>