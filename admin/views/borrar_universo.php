<?php
$id = $_GET["id"] ?? FALSE;
$universo = (new Universo())->universo_id($id);
?>

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
        <h2>¿Deseas eliminar este universo?</h2>
        <h3><?= $universo->getNombre() ?></h3>

        <div class="cont_btn_adm">
            <a href="actions/borrarUniverso.php?id=<?= $universo->getId() ?>"
                class="d-block btn btn-sm btn-danger">Eliminar</a>


            <a href="index.php?sec=adm_universo">Cancelar</a>
        </div>
    </div>
</div>