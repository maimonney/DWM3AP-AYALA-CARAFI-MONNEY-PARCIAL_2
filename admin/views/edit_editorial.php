<?php
$id = htmlspecialchars($_GET['id']);
$editorial = (new Editorial())->editorial_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Editorial</h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/editarEditorial.php" method="POST">

                <input type="hidden" name="id" value="<?= htmlspecialchars($editorial->getIdEditorial()) ?>">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="<?= htmlspecialchars($editorial->getNombreEditorial()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pais_origen">País de origen</label><br>
                    <select id="pais_origen" name="pais_origen">
                        <option value="" disabled>Elegir opción</option>
                        <option value="Estados Unidos" <?= $editorial->getPaisOrigenEditorial() == 'Estados Unidos' ? 'selected' : '' ?>>Estados Unidos</option>
                        <option value="Japón" <?= $editorial->getPaisOrigenEditorial() == 'Japón' ? 'selected' : '' ?>>Japón</option>
                        <option value="Reino Unido" <?= $editorial->getPaisOrigenEditorial() == 'Reino Unido' ? 'selected' : '' ?>>Reino Unido</option>
                        <option value="Francia" <?= $editorial->getPaisOrigenEditorial() == 'Francia' ? 'selected' : '' ?>>Francia</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                        value="<?= htmlspecialchars($editorial->getDescripcionEditorial()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fundacion" class="form-label">Fecha de creación</label>
                    <input type="date" class="form-control" id="fundacion" name="fundacion"
                        value="<?= htmlspecialchars($editorial->getFundacionEditorial()) ?>" required>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="index.php?sec=adm_editorial" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
