<?php

$autores = (new Autor())->catalogo_autor();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de autores</h1>
        <div class="row m-5 d-flex align-items-center">
            <?= (new Alerta())-> get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Alias</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">Biografia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($autores as $autor) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($autor->getNombre()) ?></td>
                            <td><?= htmlspecialchars($autor->getAlias()) ?></td>
                            <td><?= htmlspecialchars($autor->getNacimiento()) ?></td>
                            <td><?= htmlspecialchars($autor->getBiografia()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_autor&id=<?= htmlspecialchars($autor->getId()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_autor&id=<?= htmlspecialchars($autor->getId()) ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_autor" class="btn btn-primary mt-5">Agregar Autor</a>
        </div>
    </div>
</div>