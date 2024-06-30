<section class="formulario" id="formulario">
    <div class="contenedor_form">
        <h2>Formulario de Suscripción</h2>
        <form action="index.php?sec=procesar_form" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefono">Número de Celular:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario"  required></textarea>
            </div>
            

            <button class="btn btn_sub" type="submit">Suscribirse</button>
        </form>
    </div>
</section>

