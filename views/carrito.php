<?php
// session_start();

// echo "<div>";
// print_r($_SESSION["carrito"]);
// echo "</div>";

require_once "./class/Carrito.php";
require_once "./class/Alerta.php";

// echo "<div>";
// print_r((new Carrito())->get_carrito());
// echo "</div>";

$miCarrito = new carrito();
$productos = $miCarrito->get_carrito();

?>
<div class="cont_carrito">
<div>
<h2 class="text-center fs-2 my-5"> Carrito de Compras</h2>
<div class="container my-4">
    <?= (new Alerta())->get_alertas() ?>

    <?php if (count($productos) > 0) { ?>
        <form action="admin/actions/actualizarCarrito.php" method="POST">
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
                    <?php foreach ($productos as $id => $producto) { ?>
                        <tr>
                            <td><img src="img/comic/<?= $producto["portada"] ?>" alt="Imagen ilustrativa <?= $producto["titulo"] ?>" class="img-fluid rounded shadow-sm"></td>
                            <td class="align-middle">
                                <p class="h5"><?= $producto['titulo'] ?></p>
                            </td>
                            <td class="align-middle">
                                <label for="cantidad_<?= $id ?>">Cantidad</label>
                                <input type="number" value="<?= $producto["cantidad"] ?>" name="cantidad[<?= $id ?>]" id="cantidad_<?= $id ?>">
                                <button type="submit" class="btn">Actualizar cantidades</button>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"><?= $producto['precio'] ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"><?= $producto['precio'] * $producto["cantidad"] ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <a href="admin/actions/daleteProducto.php?id=<?= $id ?>" class="btn">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-end gap-2">
                <a class="btn" href="index.php?sec=todo">Seguir comprando</a>
                <a class="btn" href="admin/actions/VaciarCarrito.php">Vaciar Carrito</a>
                <a class="btn btn-secondary" href="admin/actions/FinalizarCompra.php">Finalizar Compra</a>
            </div>

        </form>
    <?php } else { ?>
        <div class="cont_carrito_h2">
        <h2 class="text-center mb-5">Su carrito está vacío</h2>
        <a class="btn" href="index.php?sec=todo">Seguir comprando</a>
        </div>
    <?php } ?>
</div>
</div></div>