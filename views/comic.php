<?php
include_once './class/Comic.php';
include_once './class/Carrito.php';
include_once './class/Alerta.php';

$comics = new Comic();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $comic = $comics->catalogo_id($id);

    if (!$comic) {
        echo "Cómic no encontrado";
        exit;
    }
} else {
    echo "ID del cómic no proporcionado";
    exit;
}
?>

<div class="contenedor_comic">
    <h2 class="titulo_comic"><?= htmlspecialchars($comic->getTituloComic()) ?></h2>

    <div class="div_comic d-flex justify-content-center align-items-center">
        <img src="./img/comic/<?= htmlspecialchars($comic->getPortadaComic()) ?>" class="card-img-top m-5" alt="<?= htmlspecialchars($comic->getTituloComic()) ?>">
        <div class="card-body m-5">
            <h3 class="card-title"><?= htmlspecialchars($comic->getTituloComic()) ?></h3>
            <p><?= htmlspecialchars($comic->getBajada()) ?></p>
            <ul class="cont_info mb-2">
                <li><strong>Autor:</strong> <?= htmlspecialchars($comic->getNombreAutor()) ?></li>
                <li><strong>Serie:</strong> <?= htmlspecialchars($comic->getNombreSerie()) ?></li>
                <li><strong>Volumen:</strong> <?= htmlspecialchars($comic->getVolumenComic()) ?></li>
                <li><strong>Personaje principal:</strong> <?= htmlspecialchars($comic->getNombrePersonaje()) ?></li>
                <li><strong>Universo:</strong> <?= htmlspecialchars($comic->getNombreUniverso()) ?></li>
                <li><strong>Fecha de publicación:</strong> <?= htmlspecialchars($comic->getPublicacionFecha()) ?></li>
                <li><strong>Editorial:</strong> <?= htmlspecialchars($comic->getNombreEditorial()) ?></li>
                <li><strong>Precio:</strong> $<?= htmlspecialchars($comic->getPrecioComic()) ?></li>
            </ul>
            <div class="card-body flex-grow-0 mt-auto">
                    <form action="admin/actions/addProducto.php" method="post" class="row">
                      <div>
                        <label for="">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" value="1">
                      </div>
                      <div class="mt-3">
                        <input class="btn" type="submit" value="Comprar">
                        <input type="hidden" name="id" value="<?= $comic->getIdComic() ?>">
                      </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
