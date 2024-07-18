<div class="error_contenedor">
    <div><img src="../img/groot.png" alt="ilustracion groot" width="200"></div>
    <div>
        <h1>Registrar Usuario</h1>

        <form action="actions/register_acc.php" method="post">
            <div class="col-md-6 mb-3">
                <label for="nombre_usuario" class="form-label">Alias</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>
</div>