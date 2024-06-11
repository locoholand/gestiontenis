<?php
require_once 'main.php';

#Almacenando datos

$descripcion_clase = limpiar_cadena($_POST['descripcion_clase']);
$fecha_inicio = limpiar_cadena($_POST['fecha_inicio']);
$fecha_fin = limpiar_cadena($_POST['fecha_fin']);
$cantidad_alumno = limpiar_cadena($_POST['cantidad_alumno']);
$user_id = limpiar_cadena($_POST['user_id']);
$pista_id = limpiar_cadena($_POST['pista_id']);

# Verificar campos obligatorios

if (
    $descripcion_clase == "" || $fecha_inicio == "" || $fecha_fin == ""
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

if (verificar_datos("[a-zA-Z1-9 ]{3,40}", $fecha_inicio)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La fecha de inicio no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-Z1-9 ]{3,40}", $fecha_fin)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La fecha final no coincide con el formato solicitado
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
$save_clasesgruapal = conection();
$save_clasesgruapal = $save_clasesgruapal->query("insert into clases_grupal(descripcion_clase, fecha_inicio, fecha_fin, cantidad_alumno, user_id, pista_id) VALUES('$descripcion_clase', '$fecha_inicio', '$fecha_fin',
'$cantidad_alumno', '$user_id', '$pista_id')");


if ($save_clasesgruapal->rowCount() == 1) {
    echo
    '<div class="notification is-danger is-light">
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
