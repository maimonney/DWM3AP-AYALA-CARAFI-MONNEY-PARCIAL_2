<?php
    $id_comic = $_GET["id"] ?? FALSE;
    $comic = (new Comic())->comic_id($id_comic);
?> 

<h2>¿Deseas eliminar este comic?</h2>
<p><?= $comic->getTituloComic() ?></p>

<a href="actions/borrarComic.php?id=<?= $comic->getIdComic() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_comic">Cancelar</a>
