<?php
$series = (new Serie())->catalogo_serie();
$editoriales = (new Editorial())->catalogo_editorial();
?>
<h2>Agregar una serie</h2>
<form class="row g-3" action="actions/accAgregarSerie.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="col-md-6 mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
    </div>

    <div class="col-md-6 mb-3">
        <label for="fecha" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" id="fecha" name="fecha">
    </div>

    <div class="col-md-6 mb-3">
        <label for="editorial" class="form-label">Editorial</label>
        <select name="editorial" id="editorial" class="form-control">
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($editoriales as $editorial) { ?>
                <option value="<?= $editorial->getIdEditorial() ?>"><?= $editorial->getNombreEditorial() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>