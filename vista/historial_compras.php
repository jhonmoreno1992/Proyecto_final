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
           GROUP_CONCAT(CONCAT(dc.cantidad, 'x ', p.nombre) SEPARATOR ', ') AS productos
    FROM compras c
    JOIN detalles_compra dc ON c.compra_id = dc.compra_id
    JOIN productos p ON dc.idproducto = p.id
    WHERE c.idusuario = ?
    GROUP BY c.compra_id
    ORDER BY c.fecha DESC
");
$stmt->execute([$userId]);
$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras - Detalles Con Dulzura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #FFE6F2;
        }

        .navbar {
            background-color: #FF69B4 !important;
        }

        .card {
            background-color: #FFF0F5;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #FF1493;
            border-color: #FF1493;
        }

        .btn-primary:hover {
            background-color: #FF69B4;
            border-color: #FF69B4;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../asset/custom/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
                Detalles Con Dulzura
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Historial de Compras</h1>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>