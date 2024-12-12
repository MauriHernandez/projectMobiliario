<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            object-fit: cover;
            height: 200px;
            border-radius: 12px 12px 0 0;
        }
        .btn-agregar {
            background-color: #34495e;
            color: #fff;
        }
        .btn-agregar:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Catálogo</h1>
        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                    <img src="<?= esc($item['foto']) ?>" alt="<?= esc($item['nombre']) ?>" class="card-img-top">

                        <div class="card-body">
                            <h5 class="card-title"><?= $item['nombre'] ?></h5>
                            <p class="card-text"><?= $item['descripcion'] ?></p>
                            <p class="card-text"><strong>Costo de renta:</strong> $<?= $item['costo_renta'] ?></p>
                            <form action="<?= site_url('catalogo/agregarCarrito/' . $item['id_mobiliario']) ?>" method="post">
    <div class="mb-3">
        <label for="cantidad-<?= $item['id_mobiliario'] ?>" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad-<?= $item['id_mobiliario'] ?>" 
               class="form-control" value="1" min="1" max="<?= $item['cantidad_disponible'] ?>" required>
    </div>
    <button type="submit" class="btn btn-agregar w-100">Agregar al carrito</button>
</form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
