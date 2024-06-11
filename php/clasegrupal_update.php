<?php
require_once './common/session_start.php';
require './php/main.php';

$id = limpiar_cadena($_POST['clase_id']);


//Verificar user

$check_clasesgrupal = conection();
$check_clasesgrupal = $check_clasesgrupal->query("select * from clases_grupal where clase_id='$id' ");

if ($check_clasesgrupal->rowCount() == 0) {
    echo '<div class="notification is-danger is-light mb-6 mt-6">
     <strong>¡Ocurrio un error inesperado!</strong><br>
     No podemos obtener la información solicitada
 </div>';
    exit();
    # code...
} else {
    $datos = $check_clasesgrupal->fetch();
}
$check_clasesgrupal = null;