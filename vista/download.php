<?php
if (isset($_GET['file'])) {
    $file_name = $_GET['file'];
    $file_path = '../asset/manual/' . $file_name;

    if (file_exists($file_path)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se especificó ningún archivo para descargar.";
}
