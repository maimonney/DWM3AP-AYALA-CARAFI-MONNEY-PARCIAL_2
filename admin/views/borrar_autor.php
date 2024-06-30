<?php
    $id = $_GET["id"] ?? FALSE;
    $autor = (new Autor())->autor_id($id);
?> 

<h2>¿Deseas eliminar este autor?</h2>
<p><?= $autor->getNombre() ?></p>

<a href="actions/borrarAutor.php?id=<?= $autor->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=adm_autor">Cancelar</a>
