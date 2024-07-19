<?php
require_once "./class/Carrito.php";
require_once "./class/Alerta.php";

$miCarrito = new Carrito();
$productos = $miCarrito->get_carrito();
$total = $miCarrito->calcularTotal();

// echo '<pre>';
// print_r ($miCarrito);
// echo '</pre>';


if (isset($_SESSION["login"]["usuario_id"])) { ?>

    <div class="cont_carrito">
        <div>
            <h2 class="text-center fs-2 my-5"> Carrito de Compras de: <?php echo $_SESSION["login"]["nombre_usuario"]; ?>
            </h2>
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
                                            <input type="number" value="<?= $producto["cantidad"] ?>" name="cantidad[<?= $id ?>]" id="cantidad_<?= $id ?>" onchange="actualizarCarrito()">
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
                    <div class="d-flex justify-content-end align-items-center text-center gap-2">

                        <div class="d-flex justify-content-end align-items-center text-center gap-2"
                            style="width:30%; height:10px">
                            <a class="btn" href="index.php?sec=todo" style="height:60px">Seguir comprando</a>
                            <a class="btn" href="admin/actions/VaciarCarrito.php" style="height:60px">Vaciar Carrito</a>
                        </div>

                        <div class="d-flex justify-content-between align-items-center text-center gap-2">

                            <form action="admin/actions/accAgregarCarrito.php" method="POST" id="finalizar_compra">
                                <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">
                                <button type="submit" class="btn" style=" height:60px">Finalizar Compra</button>
                            </form>
                            <p class="ms-4 fs-3">Total: <?= $total ?></p>
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

    <?php } else { ?>

        <div class="text-center my-5">
            <p>Inicia sesión para ver su carrito</p>
            <a href="./admin/index.php?sec=login" class="btn btn-primary">Iniciar sesión</a>
            <a href="./admin/index.php?sec=register" class="btn btn-secondary">Registrarse</a>
        </div>

    <?php } ?>

    <script>
        function actualizarCarrito() {
            document.getElementById('actualizar_carrito').submit();
        }
    </script>

    <style>
        @media (max-width: 900px) {
            .cont_carrito {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 500px) {
            .cont_carrito {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .table {
                display: flex;
                flex-direction: column;
            }
        }
    </style>