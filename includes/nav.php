<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="./img/spider.png" alt="Logo de Spider-teca">
        <h1>Spider-teca</h1>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?sec=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?sec=todo">Todos los comics</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?sec=todo" role="button" data-bs-toggle="dropdown" aria-expanded="false">Comis</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?sec=porPersonaje&personaje=Spider-Man">Spider-man</a></li>
                        <li><a class="dropdown-item" href="index.php?sec=porPersonaje&personaje=Batman">Batman</a></li>
                        <li><a class="dropdown-item" href="index.php?sec=porPersonaje&personaje=Daredevil">Daredevil</a></li>
                        <li><a class="dropdown-item" href="index.php?sec=porPersonaje&personaje=Invencible">Invencible</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?sec=formulario">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>