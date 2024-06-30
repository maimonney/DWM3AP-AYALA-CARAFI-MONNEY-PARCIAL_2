<?php
$id = htmlspecialchars($_GET['id']);
$universo = (new Universo())->universo_id($id);
?>

<div class="row my-5">
	<div class="col">
		<h1 class="text-center mb-5 fw-bold">Edición de Universo</h1>

		<div class="row mb-5 d-flex align-items-center">

			<form class="row g-3" action="actions/editarUniverso.php" method="POST" enctype="multipart/form-data">

				<div class="col-md-6 mb-3">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre"
						value="<?= htmlspecialchars($universo->getNombre()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion"
						value="<?= htmlspecialchars($universo->getDescripcion()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="creacion" class="form-label">Fecha de creación</label>
					<input type="date" class="form-control" id="creacion" name="creacion"
						value="<?= htmlspecialchars($universo->getCreacion()) ?>" required>
				</div>

				<div class="d-flex justify-content-center align-items-center">
					<button type="submit" class="btn btn-primary">Editar</button>
					<a href="index.php?sec=adm_universo" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>