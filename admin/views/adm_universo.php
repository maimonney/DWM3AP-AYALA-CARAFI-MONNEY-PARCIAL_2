<?php

$Universos = (new Universo())->catalogo_universo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Universos</h1>
        <div class="row m-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($Universos as $universo) {
                        
                        ?>
                        <tr>
                           
                            <td><?= htmlspecialchars($universo->getNombre()) ?></td>
                            <td><?= htmlspecialchars($universo->getDescripcion()) ?></td>
                            <td><?= htmlspecialchars($universo->getCreacion()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_universo&id=<?= htmlspecialchars($universo->getId()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_universo&id=<?= htmlspecialchars($universo->getId()) ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_universo" class="btn btn-primary mt-5">Agregar Universo</a>
        </div>
    </div>
</div>