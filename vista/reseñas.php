<?php
// vista/resenas.php

session_start();
require_once '../modelo/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];

$conexion = new Conexion();
$conn = $conexion->getConexion();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $calificacion = $_POST['calificacion'];
    $usuario_id = 1;

    $stmt = $conn->prepare("INSERT INTO resenas (titulo, contenido, calificacion, usuario_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titulo, $contenido, $calificacion, $usuario_id]);
}


$stmt = $conn->query("SELECT * FROM resenas ORDER BY fecha_creacion DESC");
$resenas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/styleindex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Reseñas - Detalles Con Dulzura</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="dashboard.php">Detalles Con Dulzura</a>
            <div class="navbar-nav ms-auto">
                <a href="dashboard.php" class="btn btn-outline-dark me-2">
                    <i class="bi bi-house-fill"></i>
                    Volver al Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Reseñas de Clientes</h2>

        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Agregar una Reseña</h5>
                <form method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificación</label>
                        <select class="form-select" id="calificacion" name="calificacion" required>
                            <option value="1">1 Estrella</option>
                            <option value="2">2 Estrellas</option>
                            <option value="3">3 Estrellas</option>
                            <option value="4">4 Estrellas</option>
                            <option value="5">5 Estrellas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Reseña</button>
                </form>
            </div>
        </div>

        
        <div class="row">
            <?php foreach ($resenas as $resena): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($resena['titulo']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($resena['contenido']); ?></p>
                            <div class="small text-muted">
                                <?php for ($i = 0; $i < $resena['calificacion']; $i++): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php endfor; ?>
                                <?php for ($i = $resena['calificacion']; $i < 5; $i++): ?>
                                    <i class="bi bi-star text-warning"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="card-text"><small class="text-muted">Fecha: <?php echo $resena['fecha_creacion']; ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="py-5 mt-5" style="background:url('../asset/imagen2.jpg')">
        <div class="container">
            <p class="m-0 text-center text-black">Copyright &copy; Detalles con Dulzura 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>