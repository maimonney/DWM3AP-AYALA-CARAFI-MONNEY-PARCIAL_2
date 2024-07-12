<?php
    $id = $_GET["id"] ?? FALSE;
    $editorial = (new Editorial())->editorial_id($id);
?> 

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
    <h2>¿Deseas eliminar esta editorial?</h2>
    <h3><?= $editorial->getNombreEditorial() ?></h3>

    <div class="cont_btn_adm">
    <a href="actions/borrarEditorial.php?id=<?= $editorial->getIdEditorial() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
    <a href="index.php?sec=adm_editorial">Cancelar</a>
    </div>
</div>
</div>