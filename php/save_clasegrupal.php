<?php
require_once 'main.php';

#Almacenando datos

$descripcion_clase = limpiar_cadena($_POST['descripcion_clase']);
$tipo_clases = limpiar_cadena($_POST['tipo_clases']);
$cantidad_alumno = limpiar_cadena($_POST['cantidad_alumno']);
$user_id = limpiar_cadena($_POST['user_id']);
$pista_id = limpiar_cadena($_POST['pista_id']);
$fecha = limpiar_cadena($_POST['fecha']);

$hora = limpiar_cadena($_POST['hora']);
$time=$fecha.'T'.$hora;
# Verificar campos obligatorios

if (
    $descripcion_clase == "" || $tipo_clases == ""
    || $cantidad_alumno == "" || $user_id == "" || $pista_id == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-Z1-9 ]{3,40}", $descripcion_clase)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La descripcion no coincide con el formato solicitado
        </div>';
    exit();
}





if (verificar_datos("[a-zA-Z1-9 ]{1,40}", $cantidad_alumno)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El numero de alumnos no coincide con el formato solicitado
        </div>';
    exit();
}

#Verificar clase en grupo
$check_clasesgrupal = conection();

$check_clasesgrupal = null;

##Guardando datos
$coneccion = conection();

$check_time_reserva = $coneccion->query("select id_reserva from reserva where pista_id = '$pista_id' && fecha = '$time'");
$check_time_grupal = $coneccion->query("select clase_id from clases_grupal where pista_id = '$pista_id' && fecha = '$time'");

if ($check_time_reserva->rowCount() > 0 || $check_time_grupal->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Esta pista a esta hora ya está reservada!!!.
        </div>';
    exit();
}
$save_clasesgruapal = $coneccion->query("insert into clases_grupal(descripcion_clase, tipoclases_id, cantidad_alumno, user_id, pista_id, fecha) VALUES('$descripcion_clase', '$tipo_clases', '$cantidad_alumno', '$user_id', '$pista_id', '$time')");

if ($save_clasesgruapal->rowCount() == 1) {
    echo
    '<div class="notification is-info is-light">
         <strong>¡CLASE GRUAPAL REGISTRADA!</strong><br>
        La clase se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar la clase!!!.
        </div>';
}
