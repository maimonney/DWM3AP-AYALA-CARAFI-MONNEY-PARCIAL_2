<?php
$id = htmlspecialchars($_GET['id']);
$personaje = (new Personaje())->personaje_id($id);
$autores = (new Autor())->catalogo_autor();
$universos = (new Universo())->catalogo_universo();
?>

<div class="row my-5">
	<div class="col">
		<h1 class="text-center mb-5 fw-bold">Edición de Personaje</h1>

		<div class="row mb-5 d-flex align-items-center">

			<form class="row g-3" action="actions/editarPersonaje.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?= htmlspecialchars($personaje->getId()) ?>">
				<input type="hidden" name="imagen_original" value="<?= htmlspecialchars($personaje->getImagen()) ?>">

				<div class="col-md-6 mb-3">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre"
						value="<?= htmlspecialchars($personaje->getNombre()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="alias" class="form-label">Alias</label>
					<input type="text" class="form-control" id="alias" name="alias"
						value="<?= htmlspecialchars($personaje->getAlias()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="imagen" class="form-label">Imagen</label>
					<input type="file" class="form-control" id="imagen" name="imagen">
					<img src="<?= "../img/personajes/" . htmlspecialchars($personaje->getImagen()) ?>"
						alt="Imagen actual" class="img-fluid mt-2">
				</div>

				<div class="col-md-6 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion"
						value="<?= htmlspecialchars($personaje->getDescripcion()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="autor_id" class="form-label">Autor</label>
					<select name="autor_id" id="autor_id" class="form-control" required>
						<option value="" disabled>Elegir opción</option>
						<?php foreach ($autores as $autor) { ?>
							<option value="<?= htmlspecialchars($autor->getId()) ?>"
								<?= $autor->getId() == $personaje->getAutor() ? 'selected' : '' ?>>
								<?= htmlspecialchars($autor->getNombre()) ?>
							</option>
						<?php } ?>
					</select>
				</div>

				<div class="col-md-6 mb-3">
					<label for="poderes_habilidades" class="form-label">Poderes y habilidades</label>
					<textarea class="form-control" id="poderes_habilidades" name="poderes_habilidades" rows="3"
						required><?= htmlspecialchars($personaje->getPoderesHabilidades()) ?></textarea>
				</div>

				<div class="col-md-6 mb-3">
					<label for="fecha_creacion" class="form-label">Fecha de creación</label>
					<input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion"
						value="<?= htmlspecialchars($personaje->getCreacion()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="universo_id" class="form-label">Universo</label>
					<select name="universo_id" id="universo_id" class="form-control" required>
						<option value="">Elegir universo</option>
						<?php foreach ($universos as $universo) { ?>
							<option value="<?= htmlspecialchars($universo->getId()) ?>"
								<?= $universo->getId() == $personaje->getUniverso() ? 'selected' : '' ?>>
								<?= htmlspecialchars($universo->getNombre()) ?>
							</option>
						<?php } ?>
					</select>
				</div>

				<div class="d-flex justify-content-center align-items-center">
					<button type="submit" class="btn btn-primary">Editar</button>
					<a href="index.php?sec=adm_personaje" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>