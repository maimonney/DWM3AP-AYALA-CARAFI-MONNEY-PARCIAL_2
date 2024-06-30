<?php
    $id = $_GET["id"] ?? FALSE;
    $personaje = (new Personaje())->personaje_id($id);
?> 

<h2>¿Deseas eliminar este personaje?</h2>
<p><?= $personaje->getNombre() ?></p>

<a href="actions/borrarpersonaje.php?id=<?= $personaje->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_personaje">Cancelar</a>
