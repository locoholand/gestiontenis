<div class="container is-fluid mb-6">
    <h1 class="title">RESERVAR PISTAS DE PADEL</h1>
    <h2 class="subtitle">Nueva Reserva </h2>
</div>





<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>
    <form action="" method="POST" autocomplete="off" style="width: 30vw;">

        <div class="column">
            <div class="control">
                <h3 class="subtitle">Selecciona la fecha: </h3>
                <input class="input" style="width: 20vw;" name="fecha" type="date" value="<?php if (isset($_POST['fecha'])) {
                                                                                    echo $_POST['fecha'];
                                                                                } ?>" maxlength="40">

            </div>
        </div>

        <div class="select is-warning">
                    <select name="reserva_hora">
                        <option>--Selecciona una hora--</option>
                        <option value="10:00">10:00 a 11:00</option>                       
                        <option value="11:00">11:00 a 12:00</option>
                        <option value="12:00">12:00 a 13:00</option>                       
                        <option value="13:00">13:00 a 14:00</option>
                        <option value="17:00">17:00 a 18:00</option>                       
                        <option value="18:00">18:00 a 19:00</option>
                        <option value="19:00">19:00 a 20:00</option>                       
                        <option value="20:00">20:00 a 21:00</option>
                        <option value="21:00">20:00 a 22:00</option>
                    </select>
                </div>


        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Buscar pistas</button>
        </p>




    </form>


    <?php

    require_once './php/main.php';


    if (isset($_POST['fecha'])) {


        $fecha = limpiar_cadena($_POST['fecha']);

        if (
            $fecha == ""
        ) {
            echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Entre una fecha
        </div>';
            exit();
            # code...
        };

        //$pista_nombre = limpiar_cadena($_POST['pista']);
      

        $conection = conection();

        $pista = $conection->query("select * from pistas where tipo='Padel'");


        if ($pista->rowCount() > 0) {
            $pistas = $pista->fetchAll();
    ?>
            <form class="FormularioAjax" action="./php/save_reserva.php" method="post">
                <input hidden class="input" name="fecha" type="date" value="<?php if (isset($_POST['fecha'])) {
                                                                                            echo $_POST['fecha'];
                                                                                        } ?>" maxlength="40">
                <input hidden class="input" name="user_id" type="text" value="<?php echo $_SESSION['id'] ?>" maxlength="40">
                <select name="pistas">
                    <option>--Seleecione la pista que desea--</option>
                    <?php

                    foreach ($pistas as $row) {
                    ?>


                        <option value="<?php echo $row['pista_id'] ?>"><?php echo $row['nombre'] ?></option>



                    <?php

                    }
                    ?>
                </select>

                <p class="has-text-centered">
                    <button type="submit" class="button is-info is-rounded">Guardar Reserva</button>
                </p>
            </form>




        <?php
        }
        ?>





    <?php
    }

    ?>
</div>