<?php
$id = htmlspecialchars($_GET['id']);
$series = (new Serie())->serie_id($id);
$editoriales = (new Editorial())->catalogo_editorial();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Serie</h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/editarSerie.php" method="POST">

                <input type="hidden" name="id" value="<?= htmlspecialchars($series->getIdSerie()) ?>">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" pattern="[a-zA-Z0-9\s]+" title="Solo se permiten letras, números y espacios"
                        value="<?= htmlspecialchars($series->getNombreSerie()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="255"
                        value="<?= htmlspecialchars($series->getDescripcionSerie()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha de creación</label>
                    <input type="date" class="form-control" id="fecha" name="fecha"
                        value="<?= htmlspecialchars($series->getFechaInicioSerie()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="editorial" class="form-label">Editorial</label>
                    <select name="editorial" id="editorial" class="form-control" required>
                        <option value="" selected disabled>Elegir opción</option>
                        <?php foreach ($editoriales as $editorial) { ?>
                            <option value="<?= $editorial->getIdEditorial() ?>" <?= ($editorial->getIdEditorial() == $series->getEditorialIdSerie()) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($editorial->getNombreEditorial()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="index.php?sec=adm_serie" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
