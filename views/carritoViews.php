<?php
require_once "./class/Carrito.php";
require_once "./class/Alerta.php";

$miCarrito = new Carrito();
$productos = $miCarrito->get_carrito();
$total = 0;

?>

<script>
    function actualizarCarrito() {
        document.getElementById('actualizar_carrito').submit();
    }
</script>

<div class="cont_carrito">
    <div>
        <h2 class="text-center fs-2 my-5"> Carrito de Compras</h2>
        <div class="container my-4">
            <?= (new Alerta())->get_alertas() ?>

            <?php if (count($productos) > 0) { ?>
                <form id="actualizar_carrito" action="admin/actions/actualizarCarrito.php" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="15%">Portada</th>
                                <th scope="col">Datos del producto</th>
                                <th scope="col" width="15%">Cantidad</th>
                                <th class="text-end" scope="col" width="15%">Precio Unitario</th>
                                <th class="text-end" scope="col" width="15%">Subtotal</th>
                                <th class="text-end" scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $id => $producto) {
                                $subtotal = $producto['precio'] * $producto["cantidad"];
                                $total += $subtotal;
                                ?>
                                <tr>
                                    <td><img src="img/comic/<?= $producto["portada"] ?>"
                                            alt="Imagen ilustrativa <?= $producto["titulo"] ?>"
                                            class="img-fluid rounded shadow-sm"></td>
                                    <td class="align-middle">
                                        <p class="h5"><?= $producto['titulo'] ?></p>
                                    </td>
                                    <td class="align-middle">
                                        <label for="cantidad_<?= $id ?>">Cantidad</label>
                                        <input type="number" value="<?= $producto["cantidad"] ?>" name="cantidad[<?= $id ?>]"
                                            id="cantidad_<?= $id ?>" onchange="actualizarCarrito()">
                                    </td>
                                    <td class="text-end align-middle">
                                        <p class="h5 py-3"><?= $producto['precio'] ?></p>
                                    </td>
                                    <td class="text-end align-middle">
                                        <p class="h5 py-3"><?= $subtotal ?></p>
                                    </td>
                                    <td class="text-end align-middle">
                                        <a href="admin/actions/daleteProducto.php?id=<?= $id ?>" class="btn">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>

                <div class="d-flex justify-content-end gap-2">
                    <a class="btn" href="index.php?sec=todo">Seguir comprando</a>
                    <a class="btn" href="admin/actions/VaciarCarrito.php">Vaciar Carrito</a>
                    <div>
                        <p>Total: <?= $total ?></p>
                        <a class="btn btn-secondary" href="admin/actions/FinalizarCompra.php">Finalizar Compra</a>
                    </div>
                </div>

            <?php } else { ?>
                <div class="cont_carrito_h2">
                    <h2 class="text-center mb-5">Su carrito está vacío</h2>
                    <a class="btn" href="index.php?sec=todo">Seguir comprando</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
