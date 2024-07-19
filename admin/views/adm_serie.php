<?php

$series = (new Serie())->catalogo_serie();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de series</h1>
        <div class="row m-5 d-flex align-items-center">
        <?= (new Alerta())-> get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($series as $serie) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($serie->getNombreSerie()) ?></td>
                            <td><?= htmlspecialchars($serie->getDescripcionSerie()) ?></td>
                            <td><?= htmlspecialchars($serie->getFechaInicioSerie()) ?></td>
                            <td><?= htmlspecialchars($serie->getNombreEditorial()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_serie&id=<?= htmlspecialchars($serie->getIdSerie()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_serie&id=<?= htmlspecialchars($serie->getIdSerie()) ?>"
                                    class="d-block btn btn-sm btn_eliminar">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_serie" class="btn btn-primary mt-5">Agregar Serie</a>
        </div>
    </div>
</div>