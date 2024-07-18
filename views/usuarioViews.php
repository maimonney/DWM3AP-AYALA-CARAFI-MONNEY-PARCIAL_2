<?php
session_start();
include './class/Usuario.php';
include './class/Carrito.php';

$usuario = new Usuario();
$carrito = new Carrito();
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
                    <h5 class="card-subtitle mb-2 text-muted">Historial de compras</h5>
                    <?php
                    $historialCompras = $carrito->obtenerHistorialCompras($_SESSION["login"]["usuario_id"]);

                    foreach ($historialCompras as $compra) {
                        echo "<p><strong>Fecha:</strong> " . $compra['fecha_horario'] . "</p>";
                        echo "<ul>";
                        foreach ($compra['detalles'] as $detalle) {
                            echo "<li>Nombre: " . $detalle['titulo_comic'] . ", Cantidad: " . $detalle['cantidad'] . ", Total: $" . ($detalle['cantidad'] * $detalle['precio_comic']) . "</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer text-center">
                <?php if (empty($_SESSION['carrito'])) { ?>
                    <a class="btn btn-success" href="./index.php?sec=todo">Ir a comprar</a>
                <?php } ?>
                <a class="btn btn-primary" href="./admin/actions/auth_logout_user.php">Salir</a>
            </div>
        </div>
    <?php } else { ?>

        <div class="text-center my-5">
            <p>Inicia sesión para ver su perfil</p>
            <a href="./admin/index.php?sec=login" class="btn btn-primary">Iniciar sesión</a>
            <a href="./admin/index.php?sec=register" class="btn btn-secondary">Registrarse</a>
        </div>

    <?php } ?>
</div>
