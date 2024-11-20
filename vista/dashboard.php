<?php
session_start();
require_once '../controlador/carrito_funciones.php';
require_once '../modelo/conexion.php';
require_once '../modelo/producto.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];

$carrito = obtenerCarrito();
$totalItems = array_sum(array_column($carrito, 'cantidad'));

$conexion = new Conexion();
$db = $conexion->getConection();
$producto = new Producto($db);
$productos = $producto->obtenerProductosAleatorios(8);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/styleindex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dashboard - Detalles Con Dulzura</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">
                <img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                Bienvenido, <a href="perfil.php"><?php echo htmlspecialchars($nombreUsuario); ?></a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="#!">Manual</a></li>
                    <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="desayunos.php">Desayunos</a></li>
                            <li><a class="dropdown-item" href="anchetas.php">Anchetas</a></li>
                            <li><a class="dropdown-item" href="flores.php">Flores</a></li>
                            <li><a class="dropdown-item" href="peluches.php">Peluches</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="historial_compras.php" class="btn btn-outline-dark">
                                <i class="bi bi-clock-history"></i>
                                Historial
                            </a>
                        </li>
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
        </div>
    </nav>
    <header class="bg-dark py-5" style="background:url('../asset/custom/imagen2.jpg')">
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
                <?php foreach ($productos as $producto): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="data:image/jpeg;base64,<?php echo $producto['imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombreproducto']); ?>" style="height: 400px; object-fit: cover;" />
                            <div class="card-body p-4 lila-background">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo htmlspecialchars($producto['nombreproducto']); ?></h5>
                                    $<?php echo number_format($producto['precio'], 0, ',', '.'); ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 lila-background">
                                <div class="text-center">
                                    <button class="btn btn-outline-dark mt-auto add-to-cart"
                                        data-id="<?php echo $producto['idproducto']; ?>"
                                        data-name="<?php echo htmlspecialchars($producto['nombreproducto']); ?>"
                                        data-price="<?php echo $producto['precio']; ?>">
                                        Añadir al carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="py-5" style="background:url('../asset/custom/imagen2.jpg')">
        <div class="container">
            <p class="m-0 text-center text-black">Copyright &copy; Detalles con Dulzura 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="modal fade" id="historialModal" tabindex="-1" aria-labelledby="historialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="historialModalLabel">Historial de Compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="historialContent">
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#historialBtn').click(function() {
                $.ajax({
                    url: '../controlador/obtener_historial.php',
                    type: 'GET',
                    success: function(response) {
                        $('#historialContent').html(response);
                        $('#historialModal').modal('show');
                    },
                    error: function() {
                        alert('Error al cargar el historial de compras');
                    }
                });
            });

            $('.add-to-cart').click(function() {
                var productId = $(this).data('id');
                var productName = $(this).data('name');
                var productPrice = $(this).data('price');

                $.ajax({
                    url: '../controlador/carrito_funciones.php',
                    type: 'POST',
                    data: {
                        action: 'add',
                        product_id: productId,
                        product_name: productName,
                        product_price: productPrice
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.success) {
                            alert('Producto añadido al carrito');
                            $('.badge').text(result.cartCount);
                        } else {
                            alert('Error al añadir el producto al carrito');
                        }
                    },
                    error: function() {
                        alert('Error de conexión');
                    }
                });
            });
        });
    </script>
</body>

</html>