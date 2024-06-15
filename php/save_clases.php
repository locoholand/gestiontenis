<?php
require_once 'main.php';

#Almacenando datos
$user_id= limpiar_cadena($_POST['user_id']);
$tipoclases_name = limpiar_cadena($_POST['tipoclases_nombre']);
$clase_desc = limpiar_cadena($_POST['descripcion_clase']);

# Verificar campos obligatorios

if (
    $tipoclases_name == "" || $clase_desc == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $tipoclases_name)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El nombre no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $clase_desc)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         La descripción no coincide con el formato solicitado
        </div>';
    exit();
}




##Guardando datos
$save_clases = conection();


$save_clases = $save_clases->query("insert into tipo_clases(tipoclases_nombre, descripcion_clase) VALUES('$tipoclases_name', '$clase_desc')");

if ($save_clases->rowCount() == 1) {
    echo
    '<div class="notification is-info is-light">
         <strong>¡CLASE REGISTRADA!</strong><br>
        La clase se resgistró correctamente!!!.
        </div>';
} else {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo registrar la clase!!!.
        </div>';
}
