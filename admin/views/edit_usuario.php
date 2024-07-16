<?php
$id = htmlspecialchars($_GET['id']);
$usuarios = (new Usuario())->ususario_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Usuario</h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/editarUsuario.php" method="POST">

                <input type="hidden" name="id" value="<?= htmlspecialchars($usuarios->getId()) ?>">

                <div class="col-md-6 mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                        value="<?= htmlspecialchars($usuarios->getNombre_usuario()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre_completo" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                        value="<?= htmlspecialchars($usuarios->getNombre_completo()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="<?= htmlspecialchars($usuarios->getNombre_completo()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="password" name="password"
                        value="<?= htmlspecialchars($usuarios->getNombre_completo()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pais_origen">Roles</label><br>
                    <select id="pais_origen" name="pais_origen">
                        <option value="" disabled>Elegir opción</option>
                        <option value="usuario" <?= $usuarios->getRoles() == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                        <option value="Admin" <?= $usuarios->getRoles() == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="Superadmin" <?= $usuarios->getRoles() == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="index.php?sec=adm_usuarios" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
