<?php

include_once './php/main.php';
$user_login = limpiar_cadena($_POST['user_login']);
$pass_login = limpiar_cadena($_POST['pass_login']);

//Verificar campos obligatorios
if (
    $user_login == "" || $pass_login == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
};


if (verificar_datos("[a-zA-Z0-9]{4,20}", $user_login)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El Usuario no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $pass_login)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El password no coincide con el formato solicitado
        </div>';
    exit();
}



$check_user = conection();
$check_user = $check_user->query("select * from users where user='$user_login' and activo!=0");


if ($check_user->rowCount() == 1) {
    $check_user = $check_user->fetch();

    if ($check_user['user'] == $user_login && password_verify($pass_login, $check_user['password'])) {
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
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Usuario o clave incorrectos!!!
        </div>';
}
$check_user = null;
