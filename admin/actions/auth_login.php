<?php
require_once "../../funciones/autoload.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $password = $_POST["password"];

    $autenticacion = new Autentificacion();
    $login = $autenticacion->log_in($nombre_usuario, $password);

    if ($login) {
        header("Location: ../index.php?sec=panelControl");
        exit();
    } else {
        (new Alerta())->add_alerta("Usuario o contraseña incorrecto", "danger");
        header("Location: ../index.php?sec=login");
        exit();
    }
} else {
    header("Location: ../index.php?sec=login");
    exit();
}
