<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiliario</title>
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
        .menu {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 20px;
            box-sizing: border-box;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            color: #fff;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .menu .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .menu .nav-links {
            display: flex;
            gap: 20px;
        }

        .menu .nav-links a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            text-transform: uppercase;
        }

        .menu .nav-links a:hover {
            color: #f1c40f;
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

        .overlay-message p {
            font-size: 1.3em;
            margin-top: 10px;
        }
        .carousel-item img {
            object-fit: cover;
            height: 250px;
            border-radius: 12px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        .card-body {
            background-color: #fff;
            padding: 25px;
            border-radius: 0 0 12px 12px;
            color: #333;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .text-muted {
            color: #7f8c8d;
        }
        nav {
            margin-top: 40px;
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
        }

        nav button {
            background-color: #34495e;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        nav button:hover {
            background-color: #2c3e50;
        }
        .cta {
            background-color: #f9f9f9;
            padding: 60px 20px;
            text-align: center;
        }

        .cta button {
            background-color: #34495e;
            color: #fff;
            border: none;
            padding: 14px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .cta button:hover {
            background-color: #2c3e50;
        }

        footer {
            background-color: #34495e;
            color: #fff;
            padding: 25px 0;
            text-align: center;
            font-size: 0.9rem;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu">
            <div class="logo">Mobiliario</div>
            <div class="nav-links">
                <a href="/">Inicio</a>
                <a href="/register">Registro</a>
                <a href="/login">Inicia Sesión</a>
            </div>
        </div>
        <div class="overlay-message">
            <h1>Renta de Mobiliario Teziutlán</h1>
            <p>¡Hacemos de tu evento algo inolvidable!</p>
        </div>
    </div>

    <nav>
        <button onclick="location.href='sillas.html'">Sillas</button>
        <button onclick="location.href='mesa.html'">Mesas</button>
        <button onclick="location.href='carpas.html'">Carpas</button>
        <button onclick="location.href='manteles.html'">Mantelería</button>
        <button onclick="location.href='cubiertos.html'">Cubiertos</button>
    </nav>
    <div class="content">
        <h1 class="text-center mt-5">Últimos Mobiliarios Disponibles</h1>
        
        <div id="mobiliarioCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $conexion = new mysqli("localhost", "root", "", "mobiliario");
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }
                $consulta = "SELECT * FROM mobiliario ORDER BY id_mobiliario DESC LIMIT 9";
                $resultado = $conexion->query($consulta);

                if ($resultado->num_rows > 0) {
                    echo '<div class="row">';
                    while ($fila = $resultado->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '    <div class="card h-100">';
                        echo '        <img src="' . $fila['foto'] . '" class="card-img-top" alt="' . $fila['nombre'] . '" style="object-fit: cover; height: 250px;">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="card-title">' . $fila['nombre'] . '</h5>';
                        echo '            <p class="text-muted">Costo renta: $' . $fila['costo_renta'] . '</p>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<div class="text-center">No hay mobiliarios disponibles.</div>';
                }

                $conexion->close();
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mobiliarioCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mobiliarioCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <section class="cta">
        <h2>¿Listo para tu evento?</h2>
        <p>Haz clic en el botón para cotizar o contáctanos.</p>
        <button id="btn-consultar">Consultar</button>
    </section>

    <footer>
        <p>&copy; 2024 Renta de Mobiliario Teziutlán. Todos los derechos reservados. <a href="#">Políticas de Privacidad</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function () {
            const menu = document.querySelector('.menu');
            if (window.scrollY > 50) {
                menu.style.background = '#2c3e50'; 
            } else {
                menu.style.background = 'rgba(0, 0, 0, 0.2)'; 
            }
        });
    </script>
</body>
</html>
