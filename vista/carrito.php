<?php
session_start();
require_once '../controlador/carrito_funciones.php';
require_once '../modelo/conexion.php';
require_once '../modelo/producto.php';

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

$conexion = new Conexion();
$db = $conexion->getConection();
$producto = new Producto($db);

foreach ($carrito as $id => $item) {
    $productoDetalle = $producto->obtenerProductoPorId($id);
    if ($productoDetalle) {
        $carrito[$id]['nombre'] = $productoDetalle['nombreproducto'];
        $carrito[$id]['precio'] = $productoDetalle['precio'];
        $carrito[$id]['imagen'] = base64_encode($productoDetalle['imagen']);
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
    <title>Carrito - Detalles Con Dulzura</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    Detalles Con Dulzura
                </a>
                <button class="btn btn-outline-dark" type="button" onclick="window.history.back();">
                    <i class="bi bi-chevron-left"></i>
                    Volver
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
                                    <h5 class="mb-3"><a href="../index.php" class="text-body"><i class="bi bi-arrow-left me-2"></i>Continuar Comprando</a></h5>
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
                                                        <div>
                                                            <img src="data:image/jpeg;base64,<?php echo $item['imagen']; ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5><?php echo htmlspecialchars($item['nombre']); ?></h5>
                                                            <p class="small mb-0">$<?php echo number_format($item['precio'], 2); ?> cada uno</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 50px;">
                                                            <form method="POST" class="d-flex align-items-center">
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                <button type="submit" name="accion" value="disminuir" class="btn btn-link px-2">
                                                                    <i class="bi bi-dash"></i>
                                                                </button>
                                                                <span class="mx-2"><?php echo $item['cantidad']; ?></span>
                                                                <button type="submit" name="accion" value="incrementar" class="btn btn-link px-2">
                                                                    <i class="bi bi-plus"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0">$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></h5>
                                                        </div>
                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <button type="submit" name="accion" value="eliminar" class="btn btn-link text-danger">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
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

                                            <div class="mb-3">
                                                <label for="direccion_envio" class="form-label">Dirección de envío</label>
                                                <input type="text" class="form-control" id="direccion_envio" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="metodo_pago" class="form-label">Método de pago</label>
                                                <select class="form-select" id="metodo_pago" required>
                                                    <option value="">Seleccione un método de pago</option>
                                                    <option value="tarjeta">Tarjeta de crédito</option>
                                                    <option value="paypal">PayPal</option>
                                                    <option value="transferencia">Transferencia bancaria</option>
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-info btn-block btn-lg" onclick="simularPago()">
                                                <div class="d-flex justify-content-between">
                                                    <span>$<?php echo number_format($total, 2); ?></span>
                                                    <span>Pagar <i class="bi bi-arrow-right ms-2"></i></span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function simularPago() {
            var direccionEnvio = document.getElementById('direccion_envio').value;
            var metodoPago = document.getElementById('metodo_pago').value;

            if (!direccionEnvio || !metodoPago) {
                alert('Por favor, complete todos los campos requeridos.');
                return;
            }

            alert('Procesando pago...');

            fetch('../controlador/procesar_compra.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'direccion_envio=' + encodeURIComponent(direccionEnvio) + '&metodo_pago=' + encodeURIComponent(metodoPago)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        window.location.href = 'dashboard.php';
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al procesar la compra.');
                });
        }
    </script>
</body>

</html>