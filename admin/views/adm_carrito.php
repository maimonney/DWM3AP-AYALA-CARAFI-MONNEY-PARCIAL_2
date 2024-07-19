<?php 

include '../class/Usuario.php';
include '../class/Carrito.php';
include '../class/Comic.php';
include '../class/DetallesCompra.php';

$usuario = new Usuario();

if (isset($_GET['id'])) {
    $usuarioId = $_GET['id'];
    $usuarioSeleccionado = $usuario->usuario_id($usuarioId);

    if ($usuarioSeleccionado) {
        $carrito = new Carrito();
        $detalleObject = new DetallesCompra();
        $comicObject = new Comic();
        $carritos = $carrito->getCarritosUsuario($usuarioId); 
?>

<div class="perfil_usuario">
    <h2 class="text-center my-5" style="font-size: 5rem;">Perfil de <?= htmlspecialchars($usuarioSeleccionado->getNombre_usuario()) ?></h2>
    <div class="card mx-auto mb-4" style="width: 50%;">
        <div class="card-header text-center">
            <h3 class="card-title">Información del Usuario</h3>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-subtitle mb-2 text-muted">Datos Personales</h5>
                <p><strong>Nombre de usuario:</strong> <?= htmlspecialchars($usuarioSeleccionado->getNombre_usuario()) ?></p>
                <p><strong>Nombre completo:</strong> <?= htmlspecialchars($usuarioSeleccionado->getNombre_completo()) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($usuarioSeleccionado->getEmail()) ?></p>
            </div>
            <div>
                <h5 class="card-subtitle mb-2 text-muted">Historial de compras</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Número de orden</th>
                            <th scope="col">Título</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Horario y fecha</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carritos as $carrito) { ?>
                            <tr>
                                <td><?= htmlspecialchars($carrito['id_carrito']) ?></td>
                                <td>
                                    <?php
                                    $detalles = $detalleObject->getDetallesCarrito($carrito['id_carrito']);
                                    foreach ($detalles as $detalle) { ?>
                                        <div><?= htmlspecialchars($comicObject->comic_id($detalle['comic_id'])->getTituloComic()) ?></div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                    $detalles = $detalleObject->getDetallesCarrito($carrito['id_carrito']);
                                    foreach ($detalles as $detalle) { ?>
                                        <div><?= htmlspecialchars($detalle['cantidad']) ?></div>
                                    <?php } ?>
                                </td>
                                <td><?= htmlspecialchars($carrito['fecha_horario']) ?></td>
                                <td>$<?= htmlspecialchars($carrito['total']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php } else { ?>
    <p>No se pudo encontrar el usuario con ese ID</p>
<?php } }?>
