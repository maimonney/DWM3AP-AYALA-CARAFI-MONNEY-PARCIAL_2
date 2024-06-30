<?php
$id = htmlspecialchars($_GET['id']);
$autor = (new Autor())->autor_id($id);
?>

<div class="row my-5">
	<div class="col">
		<h1 class="text-center mb-5 fw-bold">Edición de Autor</h1>

		<div class="row mb-5 d-flex align-items-center">

			<form class="row g-3" action="actions/editarAutor.php" method="POST" enctype="multipart/form-data">

				<div class="col-md-6 mb-3">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre"
						value="<?= htmlspecialchars($autor->getNombre()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="alias_autor" class="form-label">Alias</label>
					<input type="text" class="form-control" id="alias_autor" name="alias_autor"
						value="<?= htmlspecialchars($autor->getAlias()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="biografia" class="form-label">Descripción</label>
					<input type="text" class="form-control" id="biografia" name="biografia"
						value="<?= htmlspecialchars($autor->getBiografia()) ?>" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="nacimiento" class="form-label">Fecha de nacimiento</label>
					<input type="date" class="form-control" id="nacimiento" name="nacimiento"
						value="<?= htmlspecialchars($autor->getNacimiento()) ?>" required>
				</div>

				<div class="d-flex justify-content-center align-items-center">
					<button type="submit" class="btn btn-primary">Editar</button>
					<a href="index.php?sec=adm_autor" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>