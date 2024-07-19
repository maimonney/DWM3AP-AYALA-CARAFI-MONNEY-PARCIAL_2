<?php
include './class/Comic.php';
include './funciones/funciones.php';

$comic = new Comic();
$comics = $comic->catalogo_comic();
?>

<div id="comic-container" class="d-flex justify-content-center m-5 row"></div>

<!-- Paginación -->
<div aria-label="Page navigation">
  <ul id="pagination" class="pagination justify-content-center"></ul>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const comics = <?php echo json_encode($comics); ?>;
    const itemsPerPage = 6;
    let currentPage = 1;

    function renderComics(page) {
        const container = document.getElementById('comic-container');
        container.innerHTML = '';
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedComics = comics.slice(start, end);

        paginatedComics.forEach(comic => {
            const card = document.createElement('div');
            card.className = 'card m-2';
            card.style.width = '20rem';

            card.innerHTML = `
                <img src="./img/comic/${comic.portada_comic}" class="card-img-top" alt="${comic.titulo_comic}">
                <div class="card-body">
                    <h3 class="card-title fs-3">${comic.titulo_comic}</h3>
                    <p><strong>Personaje principal:</strong> ${comic.nombre_personaje}</p>
                    <p>${comic.bajada}</p>
                    <ul class="cont_info">
                        <li><strong>Autor:</strong> ${comic.nombre_autor}</li>
                        <li><strong>Precio:</strong> $${comic.precio_comic}</li>
                    </ul>
                </div>
                <div class="mb-3 btntarjeta">
                    <a href="index.php?sec=comic&id=${comic.id_comic}" class="btn mt-2 ">Ver más detalles</a>
                </div>
            `;

            container.appendChild(card);
        });
    }

    function renderPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';
        const totalPages = Math.ceil(comics.length / itemsPerPage);

        if (currentPage > 1) {
            const prevBtn = document.createElement('li');
            prevBtn.className = 'page-item';
            prevBtn.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
            prevBtn.addEventListener('click', () => {
                currentPage--;
                renderComics(currentPage);
                renderPagination();
            });
            pagination.appendChild(prevBtn);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement('li');
            pageBtn.className = `page-item ${i === currentPage ? 'active' : ''}`;
            pageBtn.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            pageBtn.addEventListener('click', () => {
                currentPage = i;
                renderComics(currentPage);
                renderPagination();
            });
            pagination.appendChild(pageBtn);
        }

        if (currentPage < totalPages) {
            const nextBtn = document.createElement('li');
            nextBtn.className = 'page-item';
            nextBtn.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
            nextBtn.addEventListener('click', () => {
                currentPage++;
                renderComics(currentPage);
                renderPagination();
            });
            pagination.appendChild(nextBtn);
        }
    }

    renderComics(currentPage);
    renderPagination();
});
</script>


<style>
/*Estilo de Paginacion*/

#pagination a{
  color: white;
}

.page-item a{
  background-color: #6d3279;
  border-color: #6d3279;
}

.page-item:hover a{
  background-color: #d38faf;
  border-color: #d38faf;
}

.page-item.active a {
  background-color: #d1a0c1;
  border-color: #d1a0c1;
}

</style>