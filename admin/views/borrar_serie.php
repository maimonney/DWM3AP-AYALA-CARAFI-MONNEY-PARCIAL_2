<?php
$id = $_GET["id"] ?? FALSE;
$serie = (new Serie())->serie_id($id);
?>

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
        <h2>¿Deseas eliminar esta serie?</h2>
        <h3><?= $serie->getNombreSerie() ?></h3>

        <div class="cont_btn_adm">
            <a href="actions/borrarSerie.php?id=<?= $serie->getIdSerie() ?>"
                class="d-block btn btn-sm btn-danger">Eliminar</a>

            <a href="index.php?sec=adm_serie">Cancelar</a>
        </div>
    </div>
</div>