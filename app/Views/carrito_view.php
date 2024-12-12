<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Carrito</h1>
        <?php if (!empty($carrito)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Costo</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td><img src="<?= base_url('uploads/' . $item['foto']) ?>" alt="<?= $item['nombre'] ?>" width="80"></td>
                            <td><?= $item['nombre'] ?></td>
                            <td><?= $item['descripcion'] ?></td>
                            <td>$<?= $item['costo_renta'] ?></td>
                            <td><?= $item['cantidad'] ?></td>
                            <td>
                                <form action="<?= site_url('catalogo/eliminarDelCarrito/' . $item['id_mobiliario']) ?>" method="post">
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">El carrito está vacío.</p>
        <?php endif; ?>
        <?php if (!empty($carrito)): ?>
            <a href="<?= site_url('catalogo/generarQR') ?>" class="btn btn-success mt-3">Alquilar</a>
        <?php endif; ?>
        <?php if (isset($qrUrl)): ?>
            <div class="mt-4 text-center">
                <h5>Escanea este código QR para las instrucciones</h5>
                <img src="<?= $qrUrl ?>" alt="QR Código" width="200">
            </div>
        <?php endif; ?>

        <a href="<?= site_url('catalogo') ?>" class="btn btn-primary mt-3">Volver al catálogo</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
