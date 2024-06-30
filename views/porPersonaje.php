<?php
include './class/Info.php';
include './funciones/funciones.php';

$info = new Info();

if (isset($_GET['personaje'])) {
    $personaje = $_GET['personaje'];
    $comicsFiltrados = filtrarPersonaje($info->catalogo_completo(), $personaje);
} else {
    echo "Personaje no proporcionado";
    exit;
}
?>

<h2 class="text-center"><?= $comicsFiltrados[0]->getPersonaje() ?></h2> 
<div class="d-flex justify-content-center m-5 row">
    <?php foreach($comicsFiltrados as $comicPersonaje) { ?>
    <div class="card m-2" style="width: 25rem;">
        <img src="./img/<?= $comicPersonaje->getPortada() ?>" class="card-img-top" alt="<?= $comicPersonaje->getTitulo() ?>">
        <div class="card-body">
            <h3 class="card-title"><?= $comicPersonaje->getTitulo() ?></h3>
            <p class="card-title"><?= $comicPersonaje->getPersonaje() ?></p>
            <p><?= recortarBajada($comicPersonaje->getBajada()) ?></p>
            <ul>
                <li>Autor: <?= $comicPersonaje->getAutor() ?></li>
                <li>Precio: $<?= $comicPersonaje->getPrecio() ?></li>
            </ul>
            <a href="index.php?sec=comic&id=<?= $comicPersonaje->getId() ?>" class="btn btn-primary">Comprar</a>
        </div>
    </div>
    <?php } ?>
</div>
