<?php
session_start();

$id = htmlspecialchars($_GET['id']);
$usuario = (new Usuario())->usuario_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Usuario</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/editarUsuario.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>">

                <div class="col-md-6 mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                        value="<?= htmlspecialchars($usuario->getNombre_usuario()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre_completo" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                        value="<?= htmlspecialchars($usuario->getNombre_completo()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="<?= htmlspecialchars($usuario->getEmail()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="password" name="password"
                        value="" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="roles">Roles</label><br>
                    <select id="roles" name="roles">
                        <option value="" disabled>Elegir opción</option>
                        <option value="usuario" <?= $usuario->getRoles() == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                        <option value="admin" <?= $usuario->getRoles() == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="superadmin" <?= $usuario->getRoles() == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
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
