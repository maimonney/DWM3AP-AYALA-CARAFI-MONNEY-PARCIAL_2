<?php
session_start();
include './class/Usuario.php';

$usuario = new Usuario();
?>

<div class="perfil_usuario">
    <h2 class="text-center my-5" style="font-size: 5rem;">Perfil de usuario</h2>
    <?php if(isset($_SESSION["login"])){ ?>
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-header text-center">
                <h3 class="card-title">Información del Usuario</h3>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-subtitle mb-2 text-muted">Datos Personales</h5>
                    <p><strong>Nombre de usuario:</strong> <?php echo $_SESSION["login"]["nombre_usuario"]; ?></p>
                    <p><strong>Nombre completo:</strong> <?php echo $_SESSION["login"]["nombre_completo"]; ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION["login"]["email"]; ?></p>
                </div>
                <div>
                    <h5 class="card-subtitle mb-2 text-muted">Historial de compra</h5>
                    <p>Soy tu historial de compra HOLA!</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary" href="./admin/actions/auth_logout_user.php">Salir</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center" role="alert">
            Debes iniciar sesión para ver tu perfil.
        </div>
</div>

</div>

        <div class="text-center my-5">
            <p>Inicia sesión para ver su perfil</p>
            <a href="./admin/index.php?sec=login" class="btn btn-primary">Iniciar sesión</a>
            <a href="./admin/index.php?sec=register" class="btn btn-secondary">Registrarse</a>
        </div>
    <?php } ?>
</div>
