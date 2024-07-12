<?php
require_once "../../funciones/autoload.php";

try {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $alias = htmlspecialchars($_POST["alias"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $autor_id = htmlspecialchars($_POST["autor"]);
    $poderes_habilidades = htmlspecialchars($_POST["poderes_habilidades"]);
    $universo_id = htmlspecialchars($_POST["universo"]);
    $fecha_creacion = htmlspecialchars($_POST["fecha_creacion"]);

    if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $imagen = (new Imagen())->subirImagen($_FILES["imagen"], "../../img/personajes");
    } else {
        $imagen = "default_image.jpg"; 
    }

    (new Personaje())->insert($nombre, $alias, $descripcion, $autor_id, $poderes_habilidades, $imagen, $universo_id, $fecha_creacion);
    (new Alerta())->add_alerta("Se agrego corectamente", "success");

    header("Location: ../index.php?sec=adm_personaje");
    exit(); 
} catch (Exception $e) {
    die($e->getMessage()); 
}
