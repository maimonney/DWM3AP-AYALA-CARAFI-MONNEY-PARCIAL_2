<div class="cont_agregar mt-5">
<h2 class="agregar_h2 mb-3">Agregar una editorial</h2>
<form class="row g-3" action="actions/accAgregarEditorial.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="pais_origen">País de origen</label><br>
        <select id="pais_origen" name="pais_origen">
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Japón">Japón</option>
            <option value="Reino Unido">Reino Unido</option>
            <option value="Francia">Francia</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
    </div>

    <div class="col-md-6 mb-3">
        <label for="fundacion" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" id="fundacion" name="fundacion">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>
</div>