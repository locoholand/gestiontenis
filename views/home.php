<div class="container is-fluid">
    <h1 class="title">Escuela de Tenis</h1>
    <h2 class="subtitle">¡Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?> !</h2>
    <h2 class="subtitle">Mis matrículas!</h2>

    <div class="container is-widescreen">
        
            <?php
            require_once "./php/main.php";
            $user_id = $_SESSION['id'];
            $coneccion = conection();
            $select_clases = $coneccion->query("select * from user_clase join clases_grupal 
                                                on user_clase.clase_id=clases_grupal.clase_id join users
                                                on clases_grupal.user_id=users.user_id join tipo_clases
                                                on clases_grupal.tipoclases_id=tipo_clases.tipoclases_id join pistas
                                                on clases_grupal.pista_id=pistas.pista_id where user_clase.user_id='$user_id'");

            $select_clases = $select_clases->fetchAll();
                    foreach ($select_clases as $rows) {
                        $tipo_clase=$rows['tipoclases_nombre'];
                        $monitor=$rows['user_name'];
                        $descripcion=$rows['descripcion_clase'];
                        $pista=$rows['nombre'];
                        $fecha=$rows['fecha'];


                        ?>
                        <div class="notification is-primary">
                            <?php
                        echo '<strong>Tipo de clase: </strong>'.$tipo_clase.'  '.'Descripción: '.$descripcion.'  '.'Monitor: '.$monitor.'  '.'Pista: '.$pista.'  '.'Fecha: '.$fecha;  
                        ?>
                        </div>
                        <?php
                    }

            ?>
        
    </div>

</div>