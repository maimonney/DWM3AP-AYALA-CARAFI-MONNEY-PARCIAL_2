<?php
require_once '../funciones/autoload.php';
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'panelControl';
$vistas = '404';

$vistasValidas = [
    'panelControl' => [
        'titulo' => 'Administracion',
        'restringido' => true,
    ],
    '404' => [
        'titulo' => 'Pagina no encontrada',
        'restringido' => false,
    ],
    // ADM
    'adm_personaje' => [
        'titulo' => 'Administracion de personajes',
        'restringido' => true,

    ],
    'adm_comic' => [
        'titulo' => 'Administracion de comics',
        'restringido' => true,
    ],
    'adm_serie' => [
        'titulo' => 'Administracion de series',
        'restringido' => true,
    ],
    'adm_universo' => [
        'titulo' => 'Administracion de universos',
        'restringido' => true,
    ],
    'adm_editorial' => [
        'titulo' => 'Administracion de editoriales',
        'restringido' => true,
    ],
    'adm_autor' => [
        'titulo' => 'Administracion de autores',
        'restringido' => true,
    ],
    // Agregar
    'agregar_personaje' => [
        'titulo' => 'Agregar personaje',
        'restringido' => true,
    ],
    'agregar_comic' => [
        'titulo' => 'Agregar comic',
        'restringido' => true,
    ],
    'agregar_serie' => [
        'titulo' => 'Agregar serie',
        'restringido' => true,
    ],
    'agregar_universo' => [
        'titulo' => 'Agregar universo',
        'restringido' => true,
    ],
    'agregar_editorial' => [
        'titulo' => 'Agregar editorial',
        'restringido' => true,
    ],
    'agregar_autor' => [
        'titulo' => 'Agregar autor',
        'restringido' => true,
    ],
    //   Borrar
    'borrar_personaje' => [
        'titulo' => 'Borrar personaje',
        'restringido' => true,
    ],
    'borrar_comic' => [
        'titulo' => 'Borrar comic',
        'restringido' => true,
    ],
    'borrar_serie' => [
        'titulo' => 'Borrar serie',
        'restringido' => true,
    ],
    'borrar_universo' => [
        'titulo' => 'Borrar universo',
        'restringido' => true,
    ],
    'borrar_editorial' => [
        'titulo' => 'Borrar editorial',
        'restringido' => true,
    ],
    'borrar_autor' => [
        'titulo' => 'Borrar autor',
        'restringido' => true,
    ],
    //    Editar
    'edit_personaje' => [
        'titulo' => 'Editar personaje',
        'restringido' => true,
    ],
    'edit_comic' => [
        'titulo' => 'Editar comic',
        'restringido' => true,
    ],
    'edit_serie' => [
        'titulo' => 'Editar serie',
        'restringido' => true,
    ],
    'edit_universo' => [
        'titulo' => 'Editar universo',
        'restringido' => true,
    ],
    'edit_editorial' => [
        'titulo' => 'Editar editorial',
        'restringido' => true,
    ],
    'edit_autor' => [
        'titulo' => 'Editar autor',
        'restringido' => true,
    ],
    // Login
    "login" => [
        "titulo" => "Login!",
        'restringido' => false,
    ],
     
     "register" => [
        "titulo" => "Registro de usuario",
        'restringido' => false,
    ]
    
];

if (array_key_exists($seccion, $vistasValidas)) {
  $vistas = $seccion;
    $titulo = $vistasValidas[$seccion]['titulo']; 
    if($vistasValidas[$seccion]['restringido'] ){
    (new Autentificacion ())->verify();
   }
   
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
                <?php if( isset($_SESSION["login"] )) {?>
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
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/auth_logout.php">Salir</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=register">Register</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?= (new Alerta())->get_alertas() ?>
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require 'views/404.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>