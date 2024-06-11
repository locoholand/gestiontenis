<?php

include_once './php/main.php';
$user_dni = limpiar_cadena($_POST['user_dni']);
$user_name = limpiar_cadena($_POST['user_name']);
$user_last_name = limpiar_cadena($_POST['user_last_name']);
$user_user = limpiar_cadena($_POST['user_user']);
$user_password1 = limpiar_cadena($_POST['user_password1']);
$user_password2 = limpiar_cadena($_POST['user_password2']);
$user_email = limpiar_cadena($_POST['user_email']);
$user_role = $_POST['user_role'];
$user_avatar = limpiar_cadena($_POST['user_avatar']);

//Verificar campos obligatorios



# Verificar campos obligatorios

if (
    $user_dni == "" || $user_name == "" || $user_last_name == ""
    || $user_password1 == "" || $user_password2 == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-Z1-9 ]{3,40}", $user_dni)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El DNI no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $user_name)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El nombre no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $user_last_name)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El apellido no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{4,20}", $user_user)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El usuario no coincide con el formato solicitado
        </div>';
    exit();
}


if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $user_password1)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La contraseña no tiene las caracteristicas correctas        </div>';
    exit();
}

if ($user_password1 != $user_password2) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Las contraseñas no coinciden!!!.
        </div>';
    exit();
}


#Verificar usuario
$check_user = conection();
$check_user = $check_user->query("select user from users where user = '$user_user'");
if ($check_user->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Este usuario ya existe!!!.
        </div>';
    exit();
}
$check_user = null;


#Verificando email
if ($user_email != "") {
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $check_email = conection();
        $check_email = $check_email->query("select email from users where email = '$user_email'");
        if ($check_email->rowCount() > 0) {

            echo
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Este email ya existe!!!.
        </div>';
            exit();
        }
    } else {
        echo
        '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El email no es valido!!!.
        </div>';
        exit();
    }
    $check_email = null;
}


if ($user_password1 != $user_password2) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Las contraseñas no coinciden!!!.
        </div>';
    exit();
} else {
    $pass = password_hash($user_password1, PASSWORD_BCRYPT, ["cost" => 10]);
}


##Guardando datos
$save_user = conection();
/* $save_user = $save_user->prepare("insert into users(dni, user_name, user_last_name, user, email, avatar) 
VALUES(:user_dnim, :user_namem, :user_last_namem, :user_userm, :passm, :user_rolem, :user_emailm, :user_avatarm)");
 */

$save_user = $save_user->query("insert into users(dni, user_name, user_last_name, user, password, role, email, avatar) VALUES('$user_dni', '$user_name', '$user_last_name',
'$user_user', '$pass', '$user_role', '$user_email', '$user_avatar')");




if ($save_user->rowCount() == 1) {
    $check_user = conection();
    $check_user = $check_user->query("select * from users where user='$user_user'");
    if ($check_user->rowCount() == 1) {
        $check_user = $check_user->fetch();

        if ($check_user['user'] == $user_user && password_verify($user_password1, $check_user['password'])) {
            $_SESSION['id'] = $check_user['user_id'];
            $_SESSION['nombre'] = $check_user['user_name'];
            $_SESSION['apellido'] = $check_user['user_last_name'];
            $_SESSION['user'] = $check_user['user'];
            $_SESSION['role'] = $check_user['role'];

            if (headers_sent()) {
                echo "<script>windows.location.href='index.php?vista=home'</script>";
            } else {
                header('Location: index.php?vista=home');
            }
        } else {
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Usuario o clave incorrectos!!!
        </div>';
            exit();
        }
    }
    $check_user = null;
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Error
        </div>';
}
$save_user=null;