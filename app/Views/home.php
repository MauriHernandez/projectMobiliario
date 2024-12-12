<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', sans-serif;
        }
        .header {
            height: 100vh;
            background: url('/images/portada_mobiliario.webp') no-repeat center center/cover;
            position: relative;
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .overlay-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            font-weight: bold;
            z-index: 2;
        }
        .overlay-message h1 {
            font-size: 3.5em;
            margin: 0;
        }
       
    </style>
</head>
<body>
   
<?php include 'menu.php'; ?>
    <div class="header">
        <div class="overlay-message">
            <h1>Bienvenido, <?= esc($nombre) ?>!</h1>
            <p>Explora el catálogo y reserva el mobiliario que necesitas.</p>
        </div>
    </div>
</body>
</html>
