<?php
$tipoclases_id_del = limpiar_cadena($_GET['tipoclases_id_del']);
echo $_GET['tipoclases_id_del'];
$check_tipoclases = conection();
$check_tipoclases = $check_tipoclases->query("select tipoclases_id from tipo_clases where tipoclases_id='$tipoclases_id_del'");
if ($check_tipoclases->rowCount() == 1) {

        $tipoclases_delete = conection();
        $tipoclases_delete = $tipoclases_delete->query("Update tipo_clases set activo=0 where tipoclases_id ='$tipoclases_id_del'");
      
        if ($tipoclases_delete->rowCount() == 1) {
            echo
            '<div class="notification is-info is-light">
         <strong>¡La Clase fue eliminada!</strong><br>
         
        </div>';
        } else {
            echo
            '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No se pudo eliminar la Clase
        </div>';
        }
    }

$check_tipoclases = null;
