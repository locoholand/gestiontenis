<?php
require_once 'main.php';

#Almacenando datos

$pista_name = limpiar_cadena($_POST['pista_name']);
$pista_tipo = limpiar_cadena($_POST['pista_tipo']);
//$pista_horario = limpiar_cadena($_POST['pista_horario']);
echo $pista_tipo;
# Verificar campos obligatorios

if (
    $pista_name == "" || $pista_tipo == "" 
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

# Verificando integridad de los datos

if (verificar_datos("[a-zA-Z0-9 ]{2,10}", $pista_name)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El nombre no coincide con el formato solicitado
        </div>';
    exit();
}

if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $pista_tipo)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El tipo no coincide con el formato solicitado
        </div>';
    exit();
}

/*if (verificar_datos("[a-zA-Z0-9]{4,20}", $pista_horario)) {
    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         El usuario no coincide con el formato solicitado
        </div>';
    exit();
}*/

#Verificar pista
$check_pista = conection();
$check_pista = $check_pista->query("select nombre from pistas where nombre = '$pista_name' && tipo='$pista_tipo'");
if ($check_pista->rowCount() > 0) {

    echo
    '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
        Esta pista ya existe!!!.
        </div>';
    exit();
}
$check_pista = null;


##Guardando datos
$save_pista = conection();
/* $save_pista = $save_pista->prepare("insert into pistas(pista_name, pista_tipo, pista_horario) 
VALUES(:pista_name, :pista_tipo, :pista_horario)");
 */

$save_pista = $save_pista->query("insert into pistas(nombre, tipo) VALUES('$pista_name', '$pista_tipo')");

/* $marcadores = [
    ":pista_namem" => $pista_name,
    ":pista_tipom" => $pista_tipo,
    ":pista_horariom" => $pista_horario,

];

$save_pista->execute($marcadores); */

if ($save_pista->rowCount() == 1) {
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
