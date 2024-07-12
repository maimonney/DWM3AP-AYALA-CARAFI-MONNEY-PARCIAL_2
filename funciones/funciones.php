<?php
$info = new Comic();
$comics = $info->catalogo_comic();

function filtrarPersonaje($catalogo, $nombrePersonaje) {
    $comicsFiltrados = array_filter($catalogo, function($comic) use ($nombrePersonaje) {
        return $comic->getNombrePersonaje() === $nombrePersonaje;
    });

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
