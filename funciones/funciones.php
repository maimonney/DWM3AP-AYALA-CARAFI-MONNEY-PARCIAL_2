<?php
$info = new Comic();
$comics = $info->catalogo_comic();

function filtrarPersonaje($comics, $personaje_id_comic) {
    $comicsFiltrados = [];

    foreach ($comics as $comic) {
        if ($comic->getPersonajeIdComic() == $personaje_id_comic) {
            $comicsFiltrados[] = $comic;
        }
    }

    return $comicsFiltrados;
}

function recortarBajada(string $bajada, int $cantidad = 25) : string
{
    $miArray = explode(" ", $bajada);   
    $arrayRecortado = [];

    if (count($miArray) > 0) {
        for ($i = 0; $i < $cantidad; $i++) {
            if ($i < count($miArray)) { 
                array_push($arrayRecortado, $miArray[$i]);
            }
        }
    }

    return implode(" ", $arrayRecortado)."...";
}
