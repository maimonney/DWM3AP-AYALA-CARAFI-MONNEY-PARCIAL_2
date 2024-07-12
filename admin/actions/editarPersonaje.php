<?php
require_once "../../funciones/autoload.php";

$fileData = $_FILES["imagen"] ?? false;

try {
    $nombreImagen = $_POST["imagen_original"]; 

    if ($fileData && $fileData['size'] > 0) {
        if (!empty($_POST["imagen_original"]) && $_POST["imagen_original"] !== 'default_image.png') {
            $imagenOriginalPath = "../img/personajes/" . $_POST["imagen_original"];
            if (file_exists($imagenOriginalPath)) {
                unlink($imagenOriginalPath); 
            }
        }

        $nombreImagen = (new Imagen())->subirImagen($fileData, "../../img/personajes");
    }

    (new Personaje())->edit(
        htmlspecialchars($_POST["nombre"]),
        htmlspecialchars($_POST["alias"]),
        htmlspecialchars($_POST["descripcion"]),
        htmlspecialchars($_POST["autor_id"]),
        htmlspecialchars($_POST["poderes_habilidades"]),
        $nombreImagen,
        htmlspecialchars($_POST["fecha_creacion"]),
        htmlspecialchars($_POST["universo_id"]),
        htmlspecialchars($_POST['id'])
    );
    (new Alerta())->add_alerta("Se pudo editar corectamente", "success");
    header("Location: ../index.php?sec=adm_personaje");
} catch (Exception $e) {
    echo $e->getMessage();
}