<?php
    $id = $_GET["id"] ?? FALSE;
    $serie = (new Serie())->serie_id($id);
?> 

<h2>¿Deseas eliminar este personaje?</h2>
<p><?= $serie->getNombreSerie() ?></p>

<a href="actions/borrarSerie.php?id=<?= $serie->getIdSerie() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_serie">Cancelar</a>
