<?php
include './class/Comic.php';
include './funciones/funciones.php';

$info = new Comic();
$comics = $info->catalogo_comic();
?>

<div class="d-flex justify-content-center m-5 row">
    <?php foreach($comics as $comic) { ?>
    <div class="card m-2" style="width: 25rem;">

        <img src="./img/comic/<?= $comic->getPortadaComic() ?>" class="card-img-top" alt="<?= $comic->getTituloComic() ?>">
        <div class="card-body">
            <h3 class="card-title"><?= $comic->getTituloComic() ?></h3>

            <p><strong>Personaje principal:</strong> <?= $comic->getNombrePersonaje() ?></p>
            <p><?= recortarBajada($comic->getBajada()) ?></p>
            <ul>
                <li>Autor: <?= $comic->getNombreAutor() ?></li>

                <li>Precio: $<?= $comic->getPrecioComic() ?></li>
            </ul>
            <a href="index.php?sec=comic&id=<?= $comic->getIdComic() ?>" class="btn btn-primary">Comprar</a>
        </div>
    </div>
    <?php } ?>
</div>
