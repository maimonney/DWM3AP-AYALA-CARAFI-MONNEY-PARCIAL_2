<?php
$id = $_GET["id"] ?? FALSE;
$autor = (new Autor())->autor_id($id);
?> 

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
    <h2>¿Deseas eliminar este autor?</h2>
    <h3><?= $autor->getNombre() ?></h3>

    <div class="cont_btn_adm">
    <a href="actions/borrarAutor.php?id=<?= $autor->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
    <a href="index.php?sec=adm_autor">Cancelar</a>
    </div>
</div>
</div>