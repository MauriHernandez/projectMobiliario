
<style>
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
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
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
</style>
<div class="menu">
        <span class="logo">Renta de Mobiliario</span>
        <div class="nav-links">
            <a href="<?= site_url('home') ?>">Inicio</a>
            <a href="<?= site_url('catalogo') ?>">Catálogo</a>
            <a href="<?= site_url('carrito') ?>">Carrito</a>
            <a href="<?= site_url('logout') ?>">Cerrar Sesión</a>
        </div>
    </div>