<?php
require_once "../../funciones/autoload.php";


$email = $_POST["email"];
$nombre_usuario = $_POST["nombre_usuario"];
$nombre_completo = $_POST["nombre"];
$password = $_POST["password"];
$roles = 'usuario';

try {
    $usuario = (new Usuario()) ->filtro_usuario_nombre($nombre_usuario);
  if($usuario){
  } else{
     (new Usuario())->insert( $email, $nombre_usuario, $nombre_completo, $password, $roles);
  }
   
   header("Location:../index.php?sec=login");
} catch (Exception $e) {
    echo $e ->getMessage();
    header("Location:../index.php?sec=register"); 
}

