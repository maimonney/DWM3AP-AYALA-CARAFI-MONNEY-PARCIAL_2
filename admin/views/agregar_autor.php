<div class="cont_agregar mt-5">
<h2 class="agregar_h2 mb-3">Agregar un autor</h2>
<form class="row g-3" action="actions/accAgregarAutor.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="alias_autor" class="form-label">Alias</label>
        <input type="text" class="form-control" id="alias_autor" name="alias_autor">
    </div>

    <div class="col-md-6 mb-3">
        <label for="biografia" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="biografia" name="biografia">
    </div>

    <div class="col-md-6 mb-3">
        <label for="nacimiento" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>
</div>