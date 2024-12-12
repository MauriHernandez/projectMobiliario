<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/css_inicio.css'); ?>">
    <style>
        .menu {
            background-color: #1a1a1a;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu .logo {
            font-size: 22px;
            font-weight: 600;
        }

        .menu .nav-links {
            list-style: none;
            display: flex;
        }

        .menu .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu .nav-links a:hover {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
        }

        .form-label {
            font-weight: 500;
            color: #555;
        }

        .form-control {
            border-radius: 6px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        body {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div class="logo">Registro Usuario</div>
        <div class="nav-links">
            <a href="/">Inicio</a>
            <a href="/register">Registro</a>
            <a href="/login">Inicia Sesión</a>
        </div>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Registro de Usuario</h2>
            <form action="<?= site_url('register/registrar') ?>" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="hidden" name="tipo_usuario" value="2"> 
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>

    <script>
        <?php if (session()->getFlashdata('mensaje')): ?>
            const mensaje = "<?= session()->getFlashdata('mensaje'); ?>";
            alert(mensaje);
            <?php if (session()->getFlashdata('mensaje') === 'El usuario ya está registrado. Por favor, inicie sesión.'): ?>
                window.location.href = "<?= site_url('login'); ?>";
            <?php endif; ?>
        <?php endif; ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
