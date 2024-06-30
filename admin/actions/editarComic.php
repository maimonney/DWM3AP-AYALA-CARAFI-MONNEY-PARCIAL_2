<?php
require_once "../../funciones/autoload.php";

$fileData = $_FILES["imagen"] ?? false;

try {
    $nombreImagen = $_POST["imagen_original"]; 

    if ($fileData && $fileData['size'] > 0) {
        if (!empty($_POST["imagen_original"]) && $_POST["imagen_original"] !== 'default_image.png') {
            $imagenOriginalPath = "../img/comic/" . $_POST["imagen_original"];
            if (file_exists($imagenOriginalPath)) {
                unlink($imagenOriginalPath); 
            }
        }

        $nombreImagen = (new Imagen())->subirImagen($fileData, "../../img/comic");
    }

    (new Comic())->edit(
        htmlspecialchars($_POST["id_comic"]),
        htmlspecialchars($_POST["serie"]),
        htmlspecialchars($_POST["volumen_comic"]),
        htmlspecialchars($_POST["titulo_comic"]),
        htmlspecialchars($_POST["personaje_id_comic"]),
        htmlspecialchars($_POST["artistas_id_comic"]),
        htmlspecialchars($_POST["editorial_id_comic"]),
        $nombreImagen,
        htmlspecialchars($_POST["publicacion_fecha"]),
        htmlspecialchars($_POST["autor_id_comic"]),
        htmlspecialchars($_POST["precio_comic"]),
        htmlspecialchars($_POST["bajada"]),
        htmlspecialchars($_POST["universo_id_comic"])
    );

    header("Location: ../index.php?sec=adm_comic");
} catch (Exception $e) {
    echo $e->getMessage();
}