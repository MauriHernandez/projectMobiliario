<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .header {
            height: 100vh; 
            background: url('images/portada_mobiliario.webp') no-repeat center center/cover;
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

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            z-index: 2;
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #34495e;
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            background-color: #34495e;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2c3e50;
        }

        .login-container a {
            text-decoration: none;
            color: #34495e;
        }

        .login-container a:hover {
            color: #f1c40f;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form action="<?= site_url('login/autenticar') ?>" method="post">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
            <div class="mt-3 text-center">
                <a href="<?= site_url('register') ?>">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
