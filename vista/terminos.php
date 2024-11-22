<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/styleterms.css">
    <title>Términos y Condiciones - Detalles Con Dulzura</title>
    <script>
        function handleAccept() {
            if (window.opener && !window.opener.closed) {

                window.opener.postMessage('terms_accepted', '*');
                window.close();
            } else {

                window.history.back();
            }
        }
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../asset/custom/logo.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">Detalles Con Dulzura</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="btn btn-outline-dark" type="submit" onclick="window.location.href='../index.php';">
                            <i class="bi bi-house-fill"></i>
                            Inicio
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-dark" type="button" onclick="window.location.href='login.php';">
                            <i class="bi bi-person-circle"></i>
                            Login
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-globe"></i> ES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="terms-container shadow">
        <h1 class="text-center mb-4">Términos y Condiciones</h1>
        <p>Bienvenido a Detalles Con Dulzura. Estos términos y condiciones describen las reglas y regulaciones para el uso del sitio web de Detalles Con Dulzura.</p>

        <h2>1. Aceptación de los Términos</h2>
        <p>Al acceder a este sitio web, asumimos que aceptas estos términos y condiciones en su totalidad. No continúes utilizando Detalles Con Dulzura si no aceptas todos los términos y condiciones establecidos en esta página.</p>

        <h2>2. Modificaciones a los Términos</h2>
        <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Te recomendamos revisar esta página periódicamente para estar al tanto de cualquier cambio.</p>

        <h2>3. Uso del Sitio</h2>
        <p>No debes:</p>
        <ul>
            <li>Republicar material de nuestro sitio web.</li>
            <li>Vender, alquilar o sublicenciar material del sitio web.</li>
            <li>Reproducir, duplicar o copiar material de Detalles Con Dulzura.</li>
        </ul>

        <h2>4. Contenido del Usuario</h2>
        <p>En estas condiciones de sitio web, "tu contenido" significará cualquier audio, video, texto, imágenes u otro material que elijas mostrar en este sitio web. Al mostrar tu contenido, otorgas a Detalles Con Dulzura una licencia no exclusiva, irrevocable y sublicenciable para usar, reproducir, adaptar, publicar, traducir y distribuir en cualquier medio.</p>

        <h2>5. Limitación de Responsabilidad</h2>
        <p>En ningún caso, Detalles Con Dulzura, ni sus directores y empleados, serán responsables por cualquier cosa que surja de o esté de alguna manera relacionada con tu uso de este sitio web.</p>


        <div class="text-center">
            <button class="btn btn-accept btn-lg" type="button" onclick="handleAccept()">Aceptar</button>
        </div>
    </div>
    <footer class="bg-light py-3 mt-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Detalles Con Dulzura. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>