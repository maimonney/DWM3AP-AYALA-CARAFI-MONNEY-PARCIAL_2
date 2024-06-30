<?php
include_once './class/Comic.php';

$info = new Comic();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $comic = $info->catalogo_id($id);

} else {
    echo "ID del cómic no proporcionado";
    exit;
}
?>
<div class="contenedor_comic">
  <h2 class="titulo_comic"><?= $comic->getTituloComic() ?></h2>


  <div class="div_comic d-flex justify-content-center align-items-center">
    <img src="./img/comic/<?= $comic->getPortadaComic() ?>" class="card-img-top m-5" alt="<?= $comic->getTituloComic() ?>">
    <div class="card-body m-5">
      <h3 class="card-title"><?= $comic->getTituloComic() ?></h3>
      <p><?= $comic->getBajada() ?></p>
      <ul>
          <li>Autor: <?= $comic->getNombreAutor() ?></li>
          <li>Artista: <?= $comic->getNombreArtista() ?></li>
          <li>Serie: <?= $comic->getNombreSerie() ?></li>
          <li>Volumen: <?= $comic->getVolumenComic() ?></li>
          <li>Personaje principal: <?= $comic->getNombrePersonaje() ?></li>
          <li>Universo: <?= $comic->getNombreUniverso() ?></li>
          <li>Fecha de publicación: <?= $comic->getPublicacionFecha() ?></li>
          <li>Editorial: <?= $comic->getNombreUniverso() ?></li>
          <li>Precio: $<?= $comic->getNombreEditorial() ?></li>
      </ul>
      <button class="btn btn_compra">Comprar</button>
    </div>
  </div>
</div>
