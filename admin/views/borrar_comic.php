<?php
$id_comic = $_GET["id"] ?? FALSE;
$comic = (new Comic())->comic_id($id_comic);
?>

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
    <h2>¿Deseas eliminar este comic?</h2>
    <h3><?= $comic->getTituloComic() ?></h3>

    <div class="cont_btn_adm">
        <a href="actions/borrarComic.php?id=<?= $comic->getIdComic() ?>" class="d-block btn btn-sm width=200">Eliminar</a>
        <a href="index.php?sec=adm_comic" class="d-block btn btn-sm">Cancelar</a>
    </div>
</div>
</div>
