<?php
require_once "../../funciones/autoload.php";

try {
    $id = htmlspecialchars($_POST["id"]);
    $email = htmlspecialchars($_POST["email"]);
    $nombre_usuario = htmlspecialchars($_POST["nombre_usuario"]);
    $nombre_completo = htmlspecialchars($_POST["nombre_completo"]);
    $password = htmlspecialchars($_POST["password"]);
    $roles = htmlspecialchars($_POST["roles"]); 

    $usuario = new Usuario();
    $usuario->edit($email, $nombre_usuario, $nombre_completo, $password, $roles, $id);

    (new Alerta())->add_alerta("Usuario editado correctamente", "success");
    header("Location: ../index.php?sec=adm_usuarios");
} catch (Exception $e) {
    echo $e->getMessage();
}
