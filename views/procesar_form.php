<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $comentario = $_POST["comentario"];

    echo '<div class="cont">';
        echo '<div class="cont_info_form">';
            echo "<h2>Gracias por suscribirte</h2>";
            echo '<div class="cont_form">';
                echo '<div class="circulo">';
                    echo '<img src="img/batman.png" alt="Batman" width="200">';
                echo '</div>';
                echo '<div>';
                    echo "<p>Hemos recibido la siguiente información:</p>";
                    echo "<p><strong>Nombre:</strong> $nombre</p>";
                    echo "<p><strong>Correo Electrónico:</strong> $email</p>";
                    echo "<p><strong>Número de Teléfono:</strong> $telefono</p>";
                    echo "<p><strong>Comentario:</strong> $comentario</p>";
                echo '</div>';
            echo "</div>";
        echo "</div>";
    echo "</div>";
}

