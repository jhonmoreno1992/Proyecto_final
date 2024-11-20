<?php

$pdf_path = '../asset/manual/manual_de_usuario.pdf';

function generate_download_link($file_path)
{
    $file_name = basename($file_path);
    $download_link = 'download.php?file=' . urlencode($file_name);
    return $download_link;
}

$download_link = generate_download_link($pdf_path);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de Usuario - Detalles Con Dulzura</title>
    <link rel="stylesheet" href="../asset/stylemanual.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <div class="container manual-container">
        <h1 class="text-center mb-4">Manual de Usuario - Detalles Con Dulzura</h1>
        <div class="text-center mb-3">
            <a href="<?php echo $download_link; ?>" class="btn btn-download btn-lg" download>
                Descargar Manual PDF
            </a>
        </div>
        <div class="embed-responsive">
            <iframe src="<?php echo $pdf_path; ?>" id="pdf-viewer" class="embed-responsive-item"></iframe>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>