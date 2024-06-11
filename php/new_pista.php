<?php
require_once 'main.php';

#Almacenando datos

$pista_name = limpiar_cadena($_POST['pista_name']);
$pista_tipo = limpiar_cadena($_POST['pista_tipo']);
//$pista_horario = limpiar_cadena($_POST['pista_horario']);


# Verificar campos obligatorios

if (
    $pista_name == "" || $pista_tipo == ""
   // || $pista_horario == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,40}", $pista_name)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El nombre de la pista no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{4,20}", $pista_tipo)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La pista no coincide con el formato solicitado
        </div>';
    exit();
}

/*
if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $pista_horario)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El horario no es correcto        </div>';
    exit();
}
*/

#Verificar pista
$check_pistas = conection();
$check_pistas = $check_user->query("select user from users where user = '$pista_name'");
if ($check_pistas->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Esta pista ya existe!!!.
        </div>';
    exit();
}
$check_pistas = null;

##Guardando datos
$save_pistas = conection();
/* $save_user = $save_user->prepare("insert into users(user_name, user_tipo, user_horario) 
VALUES(:user_namem, :user_tipo, :user_horario)");
 */

$save_pistas = $save_pistas->query("insert into users(user_name, user_tipo) VALUES('$pista_name', '$pista_tipo')");

/* $marcadores = [
    ":pista_namem" => $pista_name,
    ":pista_tipom" => $pista_tipo,
    ":pista_horariom" => $pista_horario,

];

$save_pistas->execute($marcadores); */

if ($save_pistas->rowCount() == 1) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡USUARIO REGISTRADO!</strong><br>
        La pista se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar la pista!!!.
        </div>';
}
