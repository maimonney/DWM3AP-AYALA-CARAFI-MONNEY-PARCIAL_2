<?php
require_once './class/Personaje.php';
require_once './class/Comic.php';
require_once './funciones/funciones.php'; 

$infoComic = new Comic();

if (isset($_GET['personaje'])) {
    $personaje = $_GET['personaje'];
    $comicsFiltrados = filtrarPersonaje($infoComic->catalogo_comic(), $personaje);
} else {
    echo "Personaje no proporcionado";
    exit;
}
?>

<h2 class="text-center"><?= $personaje ?></h2> 
<div class="d-flex justify-content-center m-5 row">
    <?php foreach($comicsFiltrados as $comicPersonaje) { ?>
    <div class="card m-2" style="width: 20rem;">
        <img src="./img/comic/<?= $comicPersonaje->getPortadaComic() ?>" class="card-img-top" alt="<?= $comicPersonaje->getTituloComic() ?>">
        <div class="card-body">
            <h3 class="card-title fs-3 "><?= $comicPersonaje->getTituloComic() ?></h3>
            <p class="card-title"><?= $comicPersonaje->getNombrePersonaje() ?></p>
            <p><?= recortarBajada($comicPersonaje->getBajada()) ?></p>
            <ul class="cont_info">
                <li><strong>Autor:</strong> <?= $comicPersonaje->getNombreAutor() ?></li>
                <li><strong>Precio:</strong> $<?= $comicPersonaje->getPrecioComic() ?></li>
            </ul>
        </div>

        <div class = "mb-3">
        <a href="index.php?sec=comic&id=<?= $comicPersonaje->getIdComic() ?>" class="btn mt-2 ">Comprar</a>
        </div>
    </div>
    <?php } ?>
</div>