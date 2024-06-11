<?php
$pista_id_del = limpiar_cadena($_GET['pista_id_del']);
$check_pista = conection();
$check_pista = $check_pista->query("select pista_id from pistas where pista_id='$pista_id_del'");
if ($check_pista->rowCount() == 1) {

        $pista_delete = conection();
        $pista_delete = $pista_delete->query("Update pistas set activo=0 where pista_id ='$pista_id_del'");
      
        if ($pista_delete->rowCount() == 1) {
            echo
            '<div class="notification is-info is-light">
         <strong>¡La pista fue eliminada!</strong><br>
         
        </div>';
        } else {
            echo
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo eliminar la pista
        </div>';
        }
    }

$check_pista = null;
