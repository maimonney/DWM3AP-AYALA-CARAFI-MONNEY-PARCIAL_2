<?php
$vistas = isset($_GET["sec"]) ? $_GET["sec"] : "inicio"; 

require_once "class/conexion.php"; 

$conectar = new Conexion(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css"> 
    <title>Spider-teca</title>
</head>
<body>

    <main>
        <?php require "includes/nav.php"; ?>
        
        <?php 
        // Determinar qué vista cargar
        if (file_exists("views/$vistas.php")) {
            require "views/$vistas.php"; 
        } else {
            require "views/404.php"; 
        }
        ?>
        
        <?php require "includes/footer.php"; ?> 
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
