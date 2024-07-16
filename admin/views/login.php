<div class="error_contenedor">
    <div><img src="../img/groot.png" alt="ilustracion groot" width="200"></div>
    <div>
        <h1>Iniciar Sesión</h1>
        <?= (new Alerta())->get_alertas() ?>
        <form action="actions/auth_login.php" method="post">
            <label for="nombre_usuario">Nombre de usuario</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" required>
            <label>Password</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Enviar">
        </form>
    </div>
</div>
