<?php
require_once "../../funciones/autoload.php";

try {
    $titulo_comic = htmlspecialchars($_POST["titulo"]);
    $serie_id_comic = htmlspecialchars($_POST["serie"]);
    $volumen_comic = htmlspecialchars($_POST["volumen"]);
    $personaje_id_comic = htmlspecialchars($_POST["personaje"]);
    $editorial_id_comic = htmlspecialchars($_POST["editorial"]);
    $publicacion_fecha = htmlspecialchars($_POST["fecha"]);
    $autor_id_comic = htmlspecialchars($_POST["autor"]);
    $precio_comic = htmlspecialchars($_POST["precio"]);
    $bajada = htmlspecialchars($_POST["bajada"]);
    $universo_id_comic = htmlspecialchars($_POST["universo"]);

    if ($_FILES["portada"]["error"] === UPLOAD_ERR_OK) {
        $portada_comic = (new Imagen())->subirImagen($_FILES["portada"], "../../img/comic");
    } else {
        $portada_comic = "default_image.jpg"; 
    }

    (new Comic())->insert($serie_id_comic, $volumen_comic, $titulo_comic, $personaje_id_comic, $editorial_id_comic, $portada_comic, $publicacion_fecha, $autor_id_comic, $precio_comic, $bajada, $universo_id_comic);
    (new Alerta())->add_alerta("Se agrego corectamente", "success");



    header("Location: ../index.php?sec=adm_comic");
    exit(); 
} catch (Exception $e) {
    die($e->getMessage()); 
}
