<?php
    $id = $_GET["id"] ?? FALSE;
    $editorial = (new Editorial())->editorial_id($id);
?> 

<h2>¿Deseas eliminar esta editorial?</h2>
<p><?= $editorial->getNombreEditorial() ?></p>

<a href="actions/borrarEditorial.php?id=<?= $editorial->getIdEditorial() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_editorial">Cancelar</a>
