<?php

session_start();
require_once '../modelo/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$nombreUsuario = $_SESSION['usuario'];

$conexion = new Conexion();
$conn = $conexion->getConection();

if (!$conn) {
    die("Error de conexión a la base de datos.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $calificacion = $_POST['calificacion'];
    $usuario_id = $_SESSION['usuario_id'] ?? 1;

    try {
        $stmt = $conn->prepare("INSERT INTO resenas (titulo, contenido, calificacion, usuario_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $contenido, $calificacion, $usuario_id]);
        echo "<div class='alert alert-success'>Reseña agregada exitosamente.</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al insertar la reseña: " . $e->getMessage() . "</div>";
    }
}


try {
    $stmt = $conn->query("SELECT * FROM resenas");
    $resenas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error al obtener las reseñas: " . $e->getMessage() . "</div>";
    $resenas = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/styleresenas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Reseñas - Detalles Con Dulzura</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="dashboard.php">
                <img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                Detalles Con Dulzura
            </a>
            <div class="navbar-nav ms-auto">
                <a href="dashboard.php" class="btn btn-outline-dark me-2">
                    <i class="bi bi-chevron-left"></i>
                    Volver
                </a>
            </div>
        </div>
    </nav>

    <header class="review-header py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h1 class="display-4 fw-bolder">Reseñas de Nuestros Clientes</h1>
                <p class="lead fw-normal text-black">Comparte tu experiencia con nosotros</p>
            </div>
        </div>
    </header>

    <section class="review-section py-5">
        <div class="container px-4 px-lg-5">
            <div class="review-form card mb-5 lila-background">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Agregar una Reseña</h5>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de tu Reseña</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="contenido" class="form-label">Tu Experiencia</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="calificacion" class="form-label">¿Cómo calificarías tu experiencia?</label>
                            <select class="form-select" id="calificacion" name="calificacion" required>
                                <option value="5">⭐⭐⭐⭐⭐ Excelente</option>
                                <option value="4">⭐⭐⭐⭐ Muy Bueno</option>
                                <option value="3">⭐⭐⭐ Bueno</option>
                                <option value="2">⭐⭐ Regular</option>
                                <option value="1">⭐ Necesita Mejorar</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Reseña</button>
                    </form>
                </div>
            </div>

            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3">
                <?php foreach ($resenas as $resena): ?>
                    <div class="col mb-4">
                        <div class="review-card card h-100 lila-background">
                            <div class="card-body">
                                <h5 class="review-title mb-3"><?php echo htmlspecialchars($resena['titulo']); ?></h5>
                                <p class="review-content"><?php echo htmlspecialchars($resena['contenido']); ?></p>
                                <div class="star-rating mb-2">
                                    <?php for ($i = 0; $i < $resena['calificacion']; $i++): ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php endfor; ?>
                                    <?php for ($i = $resena['calificacion']; $i < 5; $i++): ?>
                                        <i class="bi bi-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <?php if (isset($resena['fecha_creacion'])): ?>
                                    <p class="review-date mb-0">
                                        <i class="bi bi-calendar3"></i>
                                        <?php echo htmlspecialchars($resena['fecha_creacion']); ?>
                                    </p>
                                <?php endif; ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>