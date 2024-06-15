<div class="container is-fluid mb-6">
    <h1 class="title">Clases Grupales</h1>
    <h2 class="subtitle">Nueva Clase en Grupo</h2>
</div>
<div class="container pb-6 pt-6">

    <div class="form-rest mb-6 mt-6"></div>
    <?php
    require_once './php/main.php';


    $conection = conection();

    $tipo_clases = $conection->query("select * from tipo_clases where activo=1");
    $monitores = $conection->query("select * from users where activo=1 and role='Monitor'");
    $pistas=  $conection->query("select * from pistas where activo=1");


    ?>

    <form class="FormularioAjax" action="./php/save_clasegrupal.php" method="POST" autocomplete="off">

        <?php

        if ($tipo_clases->rowCount() > 0) {
            $tipo_clases = $tipo_clases->fetchAll();
        ?>
        <div class="column">
            <div class="control">

                <div class="select is-warning">
            <select name="tipo_clases">
                <option>--Seleccione el tipo de clase--</option>
                <?php

                foreach ($tipo_clases as $row) {
                ?>


                    <option value="<?php echo $row['tipoclases_id'] ?>"><?php echo $row['tipoclases_nombre'] ?></option>



                <?php

                }
                ?>
            </select>
                </div>
            </div>
        </div>
        <?php

        } ?>

        <div class="column">
            <div class="control">

                <input class="input" type="text" name="descripcion_clase" pattern="[a-zA-Z0-9$@.\- áéíóúÁÉÍÓÚñÑüÜ]{3,40}" maxlength="50" placeholder="Introduzca la descripcion de la clase">
            </div>
        </div>


        <div class="column">
            <div class="control">

                <div class="select is-warning">

                    <select name="cantidad_alumno">
                        <option>--Seleccione el numero de alumnos--</option>
                        <option value="1">Uno</option>
                        <option value="2">Dos</option>
                        <option value="3">Tres</option>
                        <option value="4">Cuatro</option>
                        <option value="5">Cinco</option>
                        <option value="6">Seis</option>
                        <option value="7">Siete</option>
                        <option value="8">Ocho</option>
                    </select>
                </div>
            </div>
        </div>

        <?php

        if ($monitores->rowCount() > 0) {
            $monitores = $monitores->fetchAll();
        ?>
        <div class="column">
            <div class="control">

                <div class="select is-warning">
            <select name="user_id">
                <option>--Seleccione el monitor--</option>
                <?php

                foreach ($monitores as $row) {
                ?>


                    <option value="<?php echo $row['user_id'] ?>"><?php echo $row['user_name'] ?></option>



                <?php

                }
                ?>
            </select>
                </div>
            </div>
        </div>
        <?php

        } ?>
       <?php

if ($pistas->rowCount() > 0) {
    $pistas = $pistas->fetchAll();
?>
<div class="column">
            <div class="control">

                <div class="select is-warning">
    <select name="pista_id">
        <option>--Seleccione la pista--</option>
        <?php

        foreach ($pistas as $row) {
        ?>


            <option value="<?php echo $row['pista_id'] ?>"><?php echo $row['nombre'].' '.'de'.' '.$row['tipo'] ?></option>



        <?php

        }
        ?>
    </select>
                </div>
            </div>
</div>
<?php

} ?>
 <div class="column">
            <div class="control">
                <h3 class="subtitle">Selecciona la fecha: </h3>
                <input class="input" style="width: 20vw;" name="fecha" type="date" maxlength="40">

            </div>
        </div>

        <div class="select is-warning">
            <select name="hora">
            <option>--Seleccione una hora</option>

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
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>

    </form>
</div>