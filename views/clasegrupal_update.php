<?php
require_once "./php/main.php";

$id = (isset($_GET['clase_id_up'])) ?  $_GET['clase_id_up'] : 0;
$id = limpiar_cadena($id);
?>

<div class="container is-fluid mb-6">
    <?php if ($id == $_SESSION['id']) { ?>


        <h1 class="title">Clases Grupales</h1>
        <h2 class="subtitle">Actualizar clases grupales</h2>
    <?php  } else { ?>
        <h1 class="title">Usuarios</h1>
        <h2 class="subtitle">Actualizar usuario</h2>
    <?php } ?>
</div>

<div class="container pb-6 pt-6">



    <?php
    include './common/btn_back.php';
    $check_user = conection();
    $check_user = $check_user->query("select * from users where user_id = '$id'");
    if ($check_user->rowCount() > 0) {
        $datos = $check_user->fetch();
    ?>






        <div class="form-rest mb-6 mt-6"></div>



        <form action="" method="POST" class="FormularioAjax" autocomplete="off">

            <input type="hidden" name="user_id" value="<?php echo $datos['user_id']; ?>" required>

            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>DNI</label>
                        <input class="input" type="text" name="user_dni" value='<?php echo $datos["dni"]; ?>' pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Nombres</label>
                        <input class="input" type="text" name="user_name" value="<?php echo $datos['user_name']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Apellidos</label>
                        <input class="input" type="text" name="user_last_name" value="<?php echo $datos['user_last_name']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Usuario</label>
                        <input class="input" type="text" name="user_user" value="<?php echo $datos['user']; ?>" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Role</label>
                        <select name="user_role">
                            <option value="<?php echo $datos['role']; ?>"><?php echo $datos['role']; ?></option>
                            <option value="Socio">Socio</option>
                            <option value="No socio">No socio</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Email</label>
                        <input class="input" type="email" name="user_email" value="<?php echo $datos['email']; ?>" maxlength="70">
                    </div>
                </div>
            </div>
            <br><br>
            <p class="has-text-centered">
                SI desea actualizar la clave de este usuario por favor llene los 2 campos. Si NO desea actualizar la clave deje los campos vacíos.
            </p>
            <br>
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Clave</label>
                        <input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Repetir clave</label>
                        <input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                    </div>
                </div>
            </div>
            <br><br><br>
            <p class="has-text-centered">
                Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
            </p>
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Usuario</label>
                        <input class="input" type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Clave</label>
                        <input class="input" type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                    </div>
                </div>
            </div>
            <p class="has-text-centered">
                <button type="submit" class="button is-success is-rounded">Actualizar</button>
            </p>
        </form>
    <?php

    } else {
        include './common/error_alert.php';
    }
    $check_user = null;
    ?>





</div>