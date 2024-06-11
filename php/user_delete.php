<?php
$user_id_del = limpiar_cadena($_GET['user_id_del']);
$check_user = conection();
$check_user = $check_user->query("select user_id from users where user_id='$user_id_del'");
if ($check_user->rowCount() == 1) {

    $check_reserva = conection();
    $check_reserva = $check_reserva->query("select user_id from reserva where user_id = '$user_id_del' limit 1");
    if ($check_reserva->rowCount() == 1) {
        echo
        '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El usuario tiene una reserva asociada, no se puede eliminar
        </div>';
    } else {
        $user_delete = conection();
        $user_delete = $user_delete->query("Update users set activo=0 where user_id ='$user_id_del'");
      
        if ($user_delete->rowCount() == 1) {
            echo
            '<div class="notification is-info is-light">
         <strong>¡El usuario fue eliminado!</strong><br>
         
        </div>';
        } else {
            echo
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo eliminar el usuario
        </div>';
        }
    }
    $check_reserva = null;
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El usuario no existe
        </div>';
}

$check_user = null;
