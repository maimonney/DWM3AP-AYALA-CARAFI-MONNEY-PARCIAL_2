<?php
$id = $_GET["id"] ?? FALSE;
$usuario = (new Usuario())->ususario_id($id);
?> 

<div class="d-flex">
    <div>
        <img src="../img/deadpool.png" alt="Ilustracion deadpool">
    </div>

    <div class="adm_borrar">
    <h2>¿Deseas eliminar este usuario?</h2>
    <h3><?= $usuario->getNombre_usuario() ?></h3>

    <div class="cont_btn_adm">
    <a href="actions/borrarUsuario.php?id=<?= $usuario->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
    <a href="index.php?sec=adm_usuarios">Cancelar</a>
    </div>
</div>
</div>