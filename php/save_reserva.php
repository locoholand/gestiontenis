<?php
require_once 'main.php';

#Almacenando datos

$fecha = limpiar_cadena($_POST['fecha']);
$pista_id = limpiar_cadena($_POST['pistas']);
$user_id = limpiar_cadena($_POST['user_id']);

$conection = conection();

#Verificar usuario
$check_reserva = conection();
$check_reserva = $check_reserva->query("select id_reserva from reserva where pista_id = '$pista_id' && fecha = '$fecha'");
if ($check_reserva->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Esta pista a esta hora ya existe!!!.
        </div>';
    exit();
}
$check_reserva = null;

##Guardando datos
$save_reserva = conection();
/* $save_user = $save_user->prepare("insert into users(dni, user_name, user_last_name, user, email, avatar) 
VALUES(:user_dnim, :user_namem, :user_last_namem, :user_userm, :passm, :user_rolem, :user_emailm, :user_avatarm)");
 */

$save_reserva = $save_reserva->query("insert into reserva(user_id, pista_id, fecha) VALUES('$user_id', '$pista_id', '$fecha')");

/* $marcadores = [
    ":user_dnim" => $user_dni,
    ":user_namem" => $user_name,
    ":user_last_namem" => $user_last_name,
    ":user_userm" => $user_user,
    ":passm" => $pass,
    ":user_rolem" => $user_role,
    ":user_emailm" => $user_email,
    ":user_avatarm" => $user_avatar

];

$save_user->execute($marcadores); */

echo $save_reserva->rowCount();
if ($save_reserva->rowCount() == 1) {
    echo
    '<div class="notification is-danger is-light">
         <strong>Reserva REGISTRADO!</strong><br>
        La reserva se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar la reserva!!!.
        </div>';
}