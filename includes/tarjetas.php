<?php
include './class/Comic.php';
include './funciones/funciones.php';

$comic = new Comic();
$comics = $comic->catalogo_comic();

?>

<div class="d-flex justify-content-center m-5 row">
    <?php foreach ($comics as $comic) { ?>
        <div class="card m-2" style="width: 25rem;">

            <img src="./img/comic/<?= $comic->getPortadaComic() ?>" class="card-img-top"
                alt="<?= $comic->getTituloComic() ?>">
            <div class="card-body">
                <h3 class="card-title"><?= $comic->getTituloComic() ?></h3>

                <p><strong>Personaje principal:</strong> <?= $comic->getNombrePersonaje() ?></p>
                <p><?= recortarBajada($comic->getBajada()) ?></p>
                <ul class="cont_info">
                    <li><strong>Autor:</strong> <?= $comic->getNombreAutor() ?></li>

                    <li><strong>Precio:</strong> $<?= $comic->getPrecioComic() ?></li>
                </ul>
                <a href="index.php?sec=comic&id=<?= $comic->getIdComic() ?>" class="btn">Ver más detalles</a>
            </div>
        </div>
    <?php } ?>
</div>