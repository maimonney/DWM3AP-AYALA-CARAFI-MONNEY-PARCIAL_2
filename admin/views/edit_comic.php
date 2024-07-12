<?php
$id = htmlspecialchars($_GET['id']);
$comic = (new Comic())->comic_id($id);
$personajes = (new Personaje())->catalogo_personaje();
$autores = (new Autor())->catalogo_autor();
$editoriales = (new Editorial())->catalogo_editorial();
$universos = (new Universo())->catalogo_universo();
$series = (new Serie())->catalogo_serie();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Edición de Comic</h1>

        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/editarComic.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_comic" value="<?= $comic->getIdComic() ?>">
                <input type="hidden" name="imagen_original" value="<?= $comic->getPortadaComic() ?>">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Título</label>
                    <input type="text" class="form-control" id="nombre" name="titulo_comic"
                           value="<?= htmlspecialchars($comic->getTituloComic()) ?>" required>
                </div>

				<div class="col-md-6 mb-3">
                    <label for="serie" class="form-label">Serie</label>
                    <select name="serie" id="serie" class="form-control" required>
                        <option value="" disabled>Elegir opción</option>
                        <?php foreach ($series as $serie) { ?>
                            <option value="<?= $serie->getIdSerie() ?>"
                                <?= $serie->getIdSerie() == $comic->getSerieIdComic() ? 'selected' : '' ?>>
                                <?= htmlspecialchars($serie->getNombreSerie()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="volumen" class="form-label">Volumen</label>
                    <input type="number" class="form-control" id="volumen" name="volumen_comic"
                           value="<?= htmlspecialchars($comic->getVolumenComic()) ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="portada" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="portada" name="portada">
                    <img src="<?= "../img/comic/" . htmlspecialchars($comic->getPortadaComic()) ?>"
                         alt="Imagen actual" class="img-fluid mt-2">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="bajada" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="bajada" name="bajada"
                           value="<?= htmlspecialchars($comic->getBajada()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="personaje" class="form-label">Personaje principal</label>
                    <select name="personaje_id_comic" id="personaje" class="form-control" required>
                        <option value="" disabled>Elegir opción</option>
                        <?php foreach ($personajes as $personaje) { ?>
                            <option value="<?= $personaje->getId() ?>"
                                <?= $personaje->getId() == $comic->getPersonajeIdComic() ? 'selected' : '' ?>>
                                <?= htmlspecialchars($personaje->getNombre()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <select name="autor_id_comic" id="autor" class="form-control" required>
                        <option value="" disabled>Elegir opción</option>
                        <?php foreach ($autores as $autor) { ?>
                            <option value="<?= $autor->getId() ?>"
                                <?= $autor->getId() == $comic->getAutorIdComic() ? 'selected' : '' ?>>
                                <?= htmlspecialchars($autor->getNombre()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="editorial" class="form-label">Editorial</label>
                    <select name="editorial_id_comic" id="editorial" class="form-control" required>
                        <option value="" disabled>Elegir opción</option>
                        <?php foreach ($editoriales as $editorial) { ?>
                            <option value="<?= $editorial->getIdEditorial() ?>"
                                <?= $editorial->getIdEditorial() == $comic->getEditorialIdComic() ? 'selected' : '' ?>>
                                <?= htmlspecialchars($editorial->getNombreEditorial()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha de publicación</label>
                    <input type="date" class="form-control" id="fecha" name="publicacion_fecha"
                           value="<?= htmlspecialchars($comic->getPublicacionFecha()) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="universo" class="form-label">Universo</label>
                    <select name="universo_id_comic" id="universo" class="form-control" required>
                        <option value="">Elegir universo</option>
                        <?php foreach ($universos as $universo) { ?>
                            <option value="<?= $universo->getId() ?>"
                                <?= $universo->getId() == $comic->getUniversoIdComic() ? 'selected' : '' ?>>
                                <?= htmlspecialchars($universo->getNombre()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio_comic"
                           value="<?= htmlspecialchars($comic->getPrecioComic()) ?>">
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="index.php?sec=adm_comic" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
