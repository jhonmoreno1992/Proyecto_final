<?php
// vista/carrito.php

require_once '../controlador/carrito_funciones.php';

// Procesar acciones del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $id = $_POST['id'];
        switch ($_POST['accion']) {
            case 'agregar':
                agregarProducto($id, $_POST['nombre'], $_POST['precio']);
                break;
            case 'incrementar':
                incrementarProducto($id);
                break;
            case 'disminuir':
                disminuirProducto($id);
                break;
            case 'eliminar':
                eliminarProducto($id);
                break;
        }
    }
}

$carrito = obtenerCarrito();
$total = calcularTotal();
?>

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
    <title>carrito</title>
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
    <section class="h-100 h-custom" style="background-color: pink;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continuar Comprando</a></h5>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Carrito de Compras</p>
                                            <p class="mb-0">Tienes <?php echo count($carrito); ?> productos en carrito</p>
                                        </div>
                                    </div>

                                    <?php foreach ($carrito as $id => $item): ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="ms-3">
                                                        <h5><?php echo $item['nombre']; ?></h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 50px;">
                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <button type="submit" name="accion" value="disminuir" class="btn btn-link">-</button>
                                                            <span><?php echo $item['cantidad']; ?></span>
                                                            <button type="submit" name="accion" value="incrementar" class="btn btn-link">+</button>
                                                        </form>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></h5>
                                                    </div>
                                                    <form method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <button type="submit" name="accion" value="eliminar" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                <div class="col-lg-5">
                                    <div class="card text-white rounded-3" style="background-color:pink;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Resumen del pedido</h5>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2">$<?php echo number_format($total, 2); ?></p>
                                            </div>

                                            <button type="button" class="btn btn-info btn-block btn-lg" onclick="simularPago()">
                                                <div class="d-flex justify-content-between">
                                                    <span>$<?php echo number_format($total, 2); ?></span>
                                                    <span>Pagar <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function simularPago() {
        alert('Simulando pago en una plataforma de pagos...');
        // Aquí puedes agregar lógica adicional para simular el proceso de pago
        setTimeout(function() {
            alert('Pago procesado con éxito. Gracias por tu compra!');
            // Redirigir al usuario o limpiar el carrito después del pago exitoso
            window.location.href = 'index.php';
        }, 2000);
    }
    </script>

</body>
</html>

