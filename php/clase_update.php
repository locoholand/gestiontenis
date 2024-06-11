<?php
require_once './common/session_start.php';
require './php/main.php';

$id = limpiar_cadena($_POST['tipoclases_id']);


//Verificar user

$check_clases = conection();
$check_clases = $check_clases->query("select * from where tipoclases_id='$id' ");

if ($check_clases->rowCount() == 0) {
    echo '<div class="notification is-danger is-light mb-6 mt-6">
     <strong>¡Ocurrio un error inesperado!</strong><br>
     No podemos obtener la información solicitada
 </div>';
    exit();
    # code...
} else {
    $datos = $check_clases->fetch();
}
$check_clases = null;