<?php
// vista/dashboard.php

session_start();
require_once '../controlador/carrito_funciones.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];

// Handle adding products to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    agregarProducto($productId, $productName, $productPrice);
}

$carrito = obtenerCarrito();
$totalItems = array_sum(array_column($carrito, 'cantidad'));
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
    <title>Dashboard - Detalles Con Dulzura</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?></a>
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
                        <a href="resenas.php" class="btn btn-outline-dark me-2">
                            <i class="bi bi-star-fill"></i>
                            Reseñas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-dark me-2">
                            <i class="bi bi-box-arrow-right"></i>
                            Cerrar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="carrito.php" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i> 
                            Carrito
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $totalItems; ?></span>
                        </a>
                    </li>
                </ul>
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
                <!-- Product cards -->
                <?php
                $products = [
                    ['id' => 1, 'name' => 'Peluches', 'price' => 15000, 'image' => '../asset/producto1.jpg'],
                    ['id' => 2, 'name' => 'Flores', 'price' => 4000, 'image' => '../asset/producto2.jpg'],
                    ['id' => 3, 'name' => 'Peluches', 'price' => 15000, 'image' => '../asset/producto1.jpg'],
                    ['id' => 4, 'name' => 'Flores', 'price' => 4000, 'image' => '../asset/producto2.jpg'],
                    ['id' => 5, 'name' => 'Peluches', 'price' => 15000, 'image' => '../asset/producto1.jpg'],
                    ['id' => 6, 'name' => 'Flores', 'price' => 4000, 'image' => '../asset/producto2.jpg'],
                    ['id' => 7, 'name' => 'Peluches', 'price' => 15000, 'image' => '../asset/producto1.jpg'],
                    ['id' => 8, 'name' => 'Flores', 'price' => 4000, 'image' => '../asset/producto2.jpg'],

                    // ... (add more products)
                ];

                foreach ($products as $product):
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                        <div class="card-body p-4 lila-background">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?php echo $product['name']; ?></h5>
                                $<?php echo number_format($product['price'], 0, ',', '.'); ?>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                            <div class="text-center">
                                <form method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-outline-dark mt-auto">Añadir al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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