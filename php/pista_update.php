<?php
require_once './common/session_start.php';
require './php/main.php';

$id = limpiar_cadena($_POST['pista_id']);


//Verificar pista

$check_pista = conection();
$check_pista = $check_pista->query("select * from where pista_id='$pista_id' ");

if ($check_pista->rowCount() == 0) {
    echo '<div class="notification is-danger is-light mb-6 mt-6">
     <strong>¡Ocurrio un error inesperado!</strong><br>
     No podemos obtener la información solicitada
 </div>';
    exit();
    # code...
} else {
    $datos = $check_pista->fetch();
}
$check_user = null;
