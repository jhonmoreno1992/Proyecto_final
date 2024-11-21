<?php
session_start();
require_once '../modelo/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];
$userId = $_SESSION['usuario_id'];

$conexion = new Conexion();
$conn = $conexion->getConection();

$stmt = $conn->prepare("
    SELECT c.compra_id, c.fecha, c.total, c.estado, c.direccion_envio, c.metodo_pago,
           GROUP_CONCAT(CONCAT(dc.cantidad, 'x ', p.nombreproducto) SEPARATOR ', ') AS productos
    FROM compras c
    JOIN detalles_compra dc ON c.compra_id = dc.compra_id
    JOIN producto p ON dc.idproducto = p.idproducto
    WHERE c.idusuario = :userId
    GROUP BY c.compra_id
    ORDER BY c.fecha DESC
");
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();
$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras - Detalles Con Dulzura</title>
    <link rel="stylesheet" href="../asset/stylehistory.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

</head>

<body>
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
    <header class="bg-dark py-5" style="background:url('../asset/custom/imagen2.jpg')">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h1 class="display-4 fw-bolder">HISTORIAL DE COMPRAS</h1>
                <p class="lead fw-normal text-black">Verifica Las compras que has adquirido con nosotros</p>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <?php if (empty($historial)): ?>
            <div class="alert alert-info" role="alert">
                No tienes compras registradas aún.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($historial as $compra): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Compra #<?php echo htmlspecialchars($compra['compra_id']); ?></h5>
                                <p class="card-text"><strong>Fecha:</strong> <?php echo htmlspecialchars($compra['fecha']); ?></p>
                                <p class="card-text"><strong>Total:</strong> $<?php echo number_format($compra['total'], 2); ?></p>
                                <p class="card-text"><strong>Estado:</strong> <?php echo htmlspecialchars($compra['estado']); ?></p>
                                <p class="card-text"><strong>Dirección de envío:</strong> <?php echo htmlspecialchars($compra['direccion_envio']); ?></p>
                                <p class="card-text"><strong>Método de pago:</strong> <?php echo htmlspecialchars($compra['metodo_pago']); ?></p>
                                <p class="card-text"><strong>Productos:</strong> <?php echo htmlspecialchars($compra['productos']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <footer class="py-5" style="background:url('../asset/custom/imagen2.jpg')">
        <div class="container">
            <p class="m-0 text-center text-black">Copyright &copy; Detalles con Dulzura 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>