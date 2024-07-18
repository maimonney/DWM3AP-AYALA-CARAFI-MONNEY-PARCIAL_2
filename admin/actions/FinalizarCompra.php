<?php
require_once '../../funciones/autoload.php';

session_start();
$usuario_id = $_SESSION['usuario_id']; 

$conexion = new Conexion();

$stmt = $conexion->prepare("INSERT INTO carrito (usuario_id, fecha_horario, total) VALUES (:usuario_id, :fecha_horario, :total)");

$fecha_horario = date('Y-m-d H:i:s');  
$total = 123.45;

$stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt->bindParam(':fecha_horario', $fecha_horario, PDO::PARAM_STR);
$stmt->bindParam(':total', $total, PDO::PARAM_STR);

$stmt->execute();

