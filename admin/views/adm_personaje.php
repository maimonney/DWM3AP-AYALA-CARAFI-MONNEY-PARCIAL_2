<?php

$personajes = (new Personaje())->catalogo_personaje();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de personajes</h1>
        <div class="row m-5 d-flex align-items-center">
        <?= (new Alerta())-> get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Alias</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Poderes</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Universo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($personajes as $personaje) {
                        $imagen = $personaje->getImagen() ? $personaje->getImagen() : 'default_image.png';
                        ?>
                        <tr>
                            <td><img src="<?= "../img/personajes/" . htmlspecialchars($imagen) ?>" alt="Imagen del personaje"
                                    class="img-fluid rounded shadow-sm"></td>
                            <td><?= htmlspecialchars($personaje->getNombre()) ?></td>
                            <td><?= htmlspecialchars($personaje->getAlias()) ?></td>
                            <td><?= htmlspecialchars($personaje->getDescripcion()) ?></td>
                            <td><?= htmlspecialchars($personaje->getNombreAutor()) ?></td>
                            <td><?= htmlspecialchars($personaje->getPoderesHabilidades()) ?></td>
                            <td><?= htmlspecialchars($personaje->getCreacion()) ?></td>
                            <td><?= htmlspecialchars($personaje->getNombreUniverso()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_personaje&id=<?= htmlspecialchars($personaje->getId()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_personaje&id=<?= htmlspecialchars($personaje->getId()) ?>"
                                    class="d-block btn btn-sm btn_eliminar">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_personaje" class="btn btn-primary mt-5">Agregar Personaje</a>
        </div>
    </div>
</div>