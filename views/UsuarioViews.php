<?php
session_start();
include './class/Usuario.php';

$usuario = new Usuario();
?>

<div class="perfil_usuario">
    <h2 class="text-center my-5" style="font-size: 5rem;">Perfil de usuario</h2>
    <?php if(isset($_SESSION["login"])){ ?>
        <div class="datos">
            <p><strong>Nombre de usuario:</strong> <?php echo $_SESSION["login"]["nombre_usuario"]; ?></p>
            <p><strong>Nombre completo:</strong> <?php echo $_SESSION["login"]["nombre_completo"]; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION["login"]["email"]; ?></p>
        </div>
        <div class="historias_compra">
            <h3>Historial de compra</h3>
            <p>Soy tu hitorial de compra HOLA!</p>
        </div>
        <a class="nav-link" href="./admin/actions/auth_logout_user.php">Salir</a>
    <?php }else{ ?>
        <div class="text-center my-5">
            <p>Inicia sesión para ver su perfil</p>
            <a href="./admin/index.php?sec=login" class="btn btn-primary">Iniciar sesión</a>
            <a href="./admin/index.php?sec=register" class="btn btn-secondary">Registrarse</a>
        </div>
    <?php } ?>
</div>
