<div class="cont_login">
    <img src="../img/groot.png" alt="ilustracion groot">
    <div>
        <h1>Iniciar Sesion</h1>
        <?= (new Alerta())->get_alertas() ?>
        <form action="actions/auth_login.php" method="post">
            <label for="">Ingresar email</label>
            <input type="text" name="email" id="email">
            <label>Password </label>
            <input type="password" name="pass" id="pass">

            <input type="submit" value="Enviar">
        </form>
    </div>
</div>