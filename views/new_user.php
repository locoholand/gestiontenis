<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Nuevo usuario</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>

    <form class="FormularioAjax" action="./php/save_user.php" method="POST" autocomplete="off">

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="user_dni" pattern="[a-zA-Z1-9 ]{3,40}" maxlength="40" placeholder="Introduzca el DNI">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="text" name="user_name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Introduzca el nombre">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="text" name="user_last_name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Introduzca los apellidos">
            </div>
        </div>


        <div class="column">
            <div class="control">
                <input class="input" type="text" name="user_user" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" placeholder="Introduzca el nombre de usuario">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="password" name="user_password1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" placeholder="Introduzca el password">
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="password" name="user_password2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" placeholder="Repita el password">
            </div>
        </div>

        <div class="column">
            <div class="control">

                <div class="select is-warning">


                    <select name="user_role">
                        <option>--Seleccione el rol--</option>
                        <option value="Socio">Socio</option>
                        <option value="No socio">No socio</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="control">
                <input class="input" type="email" name="user_email" maxlength="70" placeholder="Introduzca el email">
            </div>
        </div>

        <!--div class="file">
            <label class="file-label">
                <input class="file-input" type="file" name="resume" />
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label"> Choose a file… </span>
                </span>
            </label>
        </div-->
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>

    </form>
</div>