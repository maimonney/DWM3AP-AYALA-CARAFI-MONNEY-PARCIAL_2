<?php

$usuarios = (new Usuario())->catalogo_usuario();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de usuarios</h1>
        <div class="row m-5 d-flex align-items-center">
        <?= (new Alerta())-> get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Alias</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario->getNombre_usuario()) ?></td>
                            <td><?= htmlspecialchars($usuario->getNombre_completo()) ?></td>
                            <td><?= htmlspecialchars($usuario->getEmail()) ?></td>
                            <td><?= htmlspecialchars($usuario->getPassword()) ?></td>
                            <td><?= htmlspecialchars($usuario->getRoles()) ?></td>
                            <td>
                                <a href="index.php?sec=edit_usuario&id=<?= htmlspecialchars($usuario->getId()) ?>"
                                    class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                    <a href="index.php?sec=borrar_usuario&id=<?= htmlspecialchars($usuario->getId()) ?>"
                                    class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=register" class="btn btn-primary mt-5">Agregar usuario</a>
        </div>
    </div>
</div>