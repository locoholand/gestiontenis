<div class="main-container">

    <form class="box login" action="" method="POST" autocomplete="off">
        <h5 class="title is-5 has-text-centered is-uppercase">Escuela de Tenis</h5>

        <div class="field">
            <label class="label">Usuario</label>
            <div class="control">
                <input class="input" type="text" name="user_login" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Clave</label>
            <div class="control">
                <input class="input" type="password" name="pass_login" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
            </div>
        </div>

        <div class="field">
            <!--h2><a href="index.php?vista=recoverpass">¿Olvidaste tu contraseña?</a></h2-->
            <h3><a href="index.php?vista=register">¿No tienes cuenta?Registrate</a></h3>
        </div>

        <p class="has-text-centered mb-4 mt-3">
            <button type="submit" class="button is-info is-rounded">Iniciar sesion</button>
        </p>

        <?php
        if (isset($_POST['user_login']) && isset($_POST['pass_login'])) {
            require_once './php/start_session.php';
        }
        ?>
    </form>

</div>