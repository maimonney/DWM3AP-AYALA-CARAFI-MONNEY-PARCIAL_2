<?php
require_once '../../funciones/autoload.php';

session_start();
$usuario_id = 22;
$_SESSION['usuario_id'] = $usuario_id;

// Verificar si 'usuario_id' está presente en el array $_SESSION
if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];

    // Ejemplo de verificación y uso en otro contexto (puedes adaptarlo a tus necesidades)
    $miCarrito = new Carrito();
    $productos = $miCarrito->get_carrito();

    // Verificar si 'usuario_id' está presente en $productos
    if (isset($productos['usuario_id'])) {
        $usuario_id_producto = $productos['usuario_id'];
        // Continuar con el uso de $usuario_id_producto si es necesario
    } else {
        // La clave 'usuario_id' no está presente en $productos
        echo "La clave 'usuario_id' no está presente en el array \$productos.";
    }
} else {
    // La clave 'usuario_id' no está presente en $_SESSION
    echo "La clave 'usuario_id' no está presente en la sesión.";
}
?>
