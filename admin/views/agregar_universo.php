<h2>Agregar un universo</h2>
<form class="row g-3" action="actions/accAgregarUniverso.php" method="POST" enctype="multipart/form-data">
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

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>