<?php
$personajes = (new Personaje())->catalogo_personaje();
$autores = (new Autor())->catalogo_autor();
$editoriales = (new Editorial())->catalogo_editorial();
$universos = (new Universo())->catalogo_universo();
$series = (new Serie())->catalogo_serie();
?>
<div class="cont_agregar mt-5">
<h2 class="agregar_h2 mb-3">Agregar un comic</h2>
<form class="row g-3" action="actions/accAgregarComic.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="serie" class="form-label">Serie</label>
        <select name="serie" id="serie" class="form-control">
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($series as $serie) { ?>
                <option value="<?= $serie->getIdSerie() ?>"><?= $serie->getNombreSerie() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="volumen" class="form-label">Volumen</label>
        <input type="number" class="form-control" id="volumen" name="volumen">
    </div>

    <div class="col-md-6 mb-3">
        <label for="portada" class="form-label">Imagen</label>
        <input class="form-control" type="file" id="portada" name="portada" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="bajada" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="bajada" name="bajada" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="personaje" class="form-label">Personaje principal</label>
        <select name="personaje" id="personaje" class="form-control" required>
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($personajes as $personaje) { ?>
                <option value="<?= $personaje->getId() ?>"><?= $personaje->getAlias() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="autor" class="form-label">Autor</label>
        <select name="autor" id="autor" class="form-control">
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($autores as $autor) { ?>
                <option value="<?= $autor->getId() ?>"><?= $autor->getNombre() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="editorial" class="form-label">Editorial</label>
        <select name="editorial" id="editorial" class="form-control" required>
            <option value="" selected disabled>Elegir opción</option>
            <?php foreach ($editoriales as $editorial) { ?>
                <option value="<?= $editorial->getIdEditorial() ?>"><?= $editorial->getNombreEditorial() ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="fecha" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" id="fecha" name="fecha">
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

    <div class="col-md-6 mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>
            </div>