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
    $descripcion_clase == "" || $fecha_inicio == "" || $fecha_fin == "" || $cantidad_alumno == "" || $user_id == "" || $pista_id == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,40}", $descripcion_clase)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La descripción de la clase no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{4,20}", $fecha_inicio)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La fecha de inicio no coincide con el formato solicitado
        </div>';
    exit();
}


if (verificar_datos("[a-zA-Z0-9$@.-]{4,20}", $fecha_fin)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La fecha de inicio no coincide con el formato solicitado  
    </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{1,20}", $cantidad_alumno)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La cantidad de alumnos no coincide con el formato solicitado  
    </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{1,20}", $user_id)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El profesor no coincide con el formato solicitado  
    </div>';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{1,20}", $pista_id)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La pista no coincide con el formato solicitado  
    </div>';
    exit();
}

#Verificar clasegrupal
$check_clasesgrupal = conection();
$check_clasesgrupal = $check_clasesgrupal->query("select clase_id from clases_grupal where clase_id = '$clase_id'");
if ($check_clasesgrupal->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Esta clase grupal ya existe!!!.
        </div>';
    exit();
}
$check_clasesgrupal = null;

##Guardando datos
$save_clasegrupal = conection();

$save_clasegrupal = $save_clasegrupal->query("insert into clase_grupal(descripcion_clase, fecha_inicio, fecha_fin, cantidad_alumno, user_id, pista_id) VALUES('$descripcion_clase', '$fecha_inicio',
'$fecha_fin', '$cantidad_alumno', '$user_id', '$pista_id')");


if ($save_clasegrupal->rowCount() == 1) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡CLASE GRUPAL REGISTRADO!</strong><br>
        La clase se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar la clase!!!.
        </div>';
}
