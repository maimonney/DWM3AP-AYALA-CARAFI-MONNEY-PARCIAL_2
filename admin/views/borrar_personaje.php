<?php
$id = $_GET["id"] ?? FALSE;
$personaje = (new Personaje())->personaje_id($id);
?>

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
        <h2>¿Deseas eliminar este personaje?</h2>
        <h3><?= $personaje->getNombre() ?></h3>

        <div class="cont_btn_adm">
            <a href="actions/borrarpersonaje.php?id=<?= $personaje->getId() ?>"
                class="d-block btn btn-sm btn-danger">Eliminar</a>
            <a href="index.php?sec=adm_personaje">Cancelar</a>
        </div>
    </div>
</div>