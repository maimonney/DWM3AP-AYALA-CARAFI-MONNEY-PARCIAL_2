<?php
$autores = (new Autor())->catalogo_autor();
$universos = (new Universo())->catalogo_universo();
?>
<div class="cont_agregar mt-5">
<h2 class="agregar_h2 mb-3">Agregar un personaje</h2>
<form class="row g-3" action="actions/accAgregarPersonaje.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="col-md-6 mb-3">
        <label for="alias" class="form-label">Alias</label>
        <input type="text" class="form-control" id="alias" name="alias" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input class="form-control" type="file" id="imagen" name="imagen">
    </div>

    <div class="col-md-6 mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
    </div>

    <div class="col-md-6 mb-3">
        <label for="autor" class="form-label">Autor</label>
        <select name="autor" id="autor" class="form-control" required>
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($autores as $autor) { ?>
                <option value="<?= $autor->getId() ?>"><?= $autor->getNombre() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="poderesHabilidades" class="form-label">Poderes y habilidades</label>
        <textarea class="form-control" id="poderesHabilidades" name="poderes_habilidades" rows="3"></textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label for="fecha_creacion" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
    </div>

    <div class="col-md-6 mb-3">
        <label for="universo" class="form-label">Universo</label>
        <select name="universo" id="universo" class="form-control" required>
            <option value="" selected disabled>Elegir universo</option>
            <?php foreach ($universos as $universo) { ?>
                <option value="<?= $universo->getId() ?>"><?= $universo->getNombre() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>
            </div>