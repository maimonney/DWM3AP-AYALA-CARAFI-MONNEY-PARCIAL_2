<?php
require_once '../funciones/autoload.php';
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'panelControl';
$vistas = '404';

$vistasValidas = [
    'panelControl' => [
        'titulo' => 'Administracion',
    ],
    '404' => [
        'titulo' => 'Pagina no encontrada',
    ],
    // ADM
    'adm_personaje' => [
        'titulo' => 'Administracion de personajes'
    ],
    'adm_comic' => [
        'titulo' => 'Administracion de comics'
    ],
    'adm_serie' => [
        'titulo' => 'Administracion de series'
    ],
    'adm_universo' => [
        'titulo' => 'Administracion de universos'
    ],
    'adm_editorial' => [
        'titulo' => 'Administracion de editoriales'
    ],
    'adm_autor' => [
        'titulo' => 'Administracion de autores'
    ],
    'adm_artista' => [
        'titulo' => 'Administracion de artistas'
    ],
    // Agregar
    'agregar_personaje' => [
        'titulo' => 'Agregar personaje'
    ],
    'agregar_comic' => [
        'titulo' => 'Agregar comic'
    ],
    'agregar_serie' => [
        'titulo' => 'Agregar serie'
    ],
    'agregar_universo' => [
        'titulo' => 'Agregar universo'
    ],
    'agregar_editorial' => [
        'titulo' => 'Agregar editorial'
    ],
    'agregar_autor' => [
        'titulo' => 'Agregar autor'
    ],
    'agregar_artista' => [
        'titulo' => 'Agregar artista'
    ],
    //   Borrar
    'borrar_personaje' => [
        'titulo' => 'Borrar personaje'
    ],
    'borrar_comic' => [
        'titulo' => 'Borrar comic'
    ],
    'borrar_serie' => [
        'titulo' => 'Borrar serie'
    ],
    'borrar_universo' => [
        'titulo' => 'Borrar universo'
    ],
    'borrar_editorial' => [
        'titulo' => 'Borrar editorial'
    ],
    'borrar_autor' => [
        'titulo' => 'Borrar autor'
    ],
    'borrar_artista' => [
        'titulo' => 'Borrar artista'
    ],
    //    Editar
    'edit_personaje' => [
        'titulo' => 'Editar personaje'
    ],
    'edit_comic' => [
        'titulo' => 'Editar comic'
    ],
    'edit_serie' => [
        'titulo' => 'Editar serie'
    ],
    'edit_universo' => [
        'titulo' => 'Editar universo'
    ],
    'edit_editorial' => [
        'titulo' => 'Editar editorial'
    ],
    'edit_autor' => [
        'titulo' => 'Editar autor'
    ],
    'edit_artista' => [
        'titulo' => 'Editar artista'
    ],
    "login" => [
        "titulo" => "Login!"
    ]


];

if (array_key_exists($seccion, $vistasValidas)) {
    $vistas = $seccion;
    $titulo = $vistasValidas[$seccion]['titulo'];
} else {
    $titulo = 'Pagina no encontrada';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <img src="../img/spider.png" alt="Logo de Spider-teca">
            <a class="navbar-brand" href="index.php">Spider-teca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=panelControl">Panel de control</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?sec=panelControl" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Modificar area:</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?sec=adm_personaje">Personajes</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_comic">Comic</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_serie">Series</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_universo">Universo</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_editorial">Editorial</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_autor">Autor</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=adm_artista">Artista</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=login">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require 'views/404.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>