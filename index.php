<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargando...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }
        .loader {
            text-align: center;
        }
        .loader h1 {
            color: #333;
        }
        .loader p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="loader">
        <h1>🚀 Cargando Warmi360...</h1>
        <p>Por favor espera unos segundos.</p>
    </div>

    <script>
        // Redirigir después de 2 segundos
        setTimeout(function() {
            window.location.href = '/public/index.php';
        }, 2000);
    </script>
</body>
</html>