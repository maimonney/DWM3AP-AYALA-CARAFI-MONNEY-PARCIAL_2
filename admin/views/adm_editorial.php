<?php

$editoriales = (new Editorial())->catalogo_editorial();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Editoriales</h1>
        <div class="row m-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($editoriales as $editorial) {

                        ?>
                        <tr>
                            <td><?= htmlspecialchars($editorial->getNombreEditorial()) ?></td>
                            <td><?= htmlspecialchars($editorial->getPaisOrigenEditorial()) ?></td>
                            <td><?= htmlspecialchars($editorial->getDescripcionEditorial()) ?></td>
                            <td><?= htmlspecialchars($editorial->getFundacionEditorial()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_editorial&id=<?= htmlspecialchars($editorial->getIdEditorial()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_editorial&id=<?= htmlspecialchars($editorial->getIdEditorial()) ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_editorial" class="btn btn-primary mt-5">Agregar Editorial</a>
        </div>
    </div>
</div>