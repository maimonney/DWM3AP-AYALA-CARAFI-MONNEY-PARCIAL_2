<?php
    $id = $_GET["id"] ?? FALSE;
    $universo = (new Universo())->universo_id($id);
?> 

<h2>¿Deseas eliminar este universo?</h2>
<p><?= $universo->getNombre() ?></p>

<a href="actions/borrarUniverso.php?id=<?= $universo->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_universo">Cancelar</a>
