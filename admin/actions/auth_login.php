<?php
require_once "../../funciones/autoload.php";

$nombre_usuario = $_POST["nombre_usuario"];
$password = $_POST["password"];

$login = (new Autentificacion())->log_in($nombre_usuario, $password);

if ($login) {
    header("Location: ../index.php?sec=panelControl");
} else {
    (new Alerta())->add_alerta("Usuario o contraseña incorrecto", "danger");
    header("Location: ../index.php?sec=login");
}