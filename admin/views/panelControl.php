<?php
include '../class/Usuario.php';

$usuario = new Usuario();
?>

<div class="d-flex justify-content-center p-5 cont_panel_control">
    <div>
        <h1>Panel de control</h1>
        
        <div class="d-flex mt-5">
            
            <div><img src="../img/batman_panel.png" alt="ilustracion batman" width="200"></div>

            <div class="panel_control">
                <h2 class="text-center mt-5">Bienvenido <?= htmlspecialchars($_SESSION["login"]["nombre_usuario"]) ?></h2>
                <h3 class="mb-5">¿Qué desea editar?</h3>
                <div class="btn_adm_cont">
                    <a href="index.php?sec=adm_personaje">Personajes</a>
                    <a href="index.php?sec=adm_comic">Comics</a>
                    <a href="index.php?sec=adm_serie">Series</a>
                    <a href="index.php?sec=adm_universo">Universos</a>
                    <a href="index.php?sec=adm_editorial">Editorial</a>
                    <a href="index.php?sec=adm_autor">Autor</a>
                    <?php if ($_SESSION["login"] && $_SESSION["login"]["roles"] === "superadmin") { ?>
                        <a href="index.php?sec=adm_usuarios">Usuarios</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>