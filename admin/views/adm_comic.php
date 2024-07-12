<?php

$comics = (new Comic())->catalogo_comic();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Comics</h1>
        <div class="row m-5 d-flex align-items-center">
        <?= (new Alerta())-> get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Portada</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Personaje principal</th>
                        <th scope="col">Volumen</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Fecha de publicacion</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Universo</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($comics as $Comic) {
                        $imagen = $Comic->getPortadaComic() ? $Comic->getPortadaComic() : 'default_image.png';
                        ?>
                        <tr>
                            <td><img src="<?= "../img/comic/" . htmlspecialchars($imagen) ?>" alt="Imagen del comic"
                                    class="img-fluid rounded shadow-sm" width="250"></td>
                            <td><?= htmlspecialchars($Comic->getTituloComic()) ?></td>
                            <td><?= htmlspecialchars($Comic->getNombrePersonaje()) ?></td>
                            <td><?= htmlspecialchars($Comic->getVolumenComic()) ?></td>
                            <td><?= htmlspecialchars($Comic->getNombreSerie()) ?></td>
                            <td><?= htmlspecialchars($Comic->getPublicacionFecha()) ?></td>
                            <td><?= htmlspecialchars($Comic->getNombreAutor()) ?></td>
                            <td><?= htmlspecialchars($Comic->getNombreEditorial()) ?></td>
                            <td><?= htmlspecialchars($Comic->getBajada()) ?></td>
                            <td><?= htmlspecialchars($Comic->getNombreUniverso()) ?></td>
                            <td width="120">$ <?= htmlspecialchars($Comic->getPrecioComic()) ?></td>

                            <td>
                                <a href="index.php?sec=edit_comic&id=<?= htmlspecialchars($Comic->getIdComic()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?sec=borrar_comic&id=<?= htmlspecialchars($Comic->getIdComic()) ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=agregar_comic" class="btn btn-primary mt-5">Agregar Comic</a>
        </div>
    </div>
</div>