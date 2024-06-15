<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">


        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="index.php?vista=home" class="navbar-item">
                Inicio
            </a>
            <?php
            if ($_SESSION['role'] == 'Admin') {
            ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Usuarios
                    </a>

                    <div class="navbar-dropdown">
                        <a href="index.php?vista=new_user" class="navbar-item">
                            Nuevo
                        </a>

                        <a href="index.php?vista=user_list" class="navbar-item">
                            Listar Usuarios
                        </a>

                        <hr class="navbar-divider">

                    </div>


                </div>
            <?php
            }

            if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Monitor') {
            ?>


                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Pistas
                    </a>

                    <div class="navbar-dropdown">
                        <a href="index.php?vista=new_pista" class="navbar-item">
                            Nueva Pista
                        </a>

                        <a href="index.php?vista=pista_list" class="navbar-item">
                            Listado de Pistas
                        </a>

                    </div>
                </div>
            <?php
            }
            if ($_SESSION['role'] != 'No socio') {


            ?>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Reservas
                    </a>

                    <div class="navbar-dropdown">
                        <a href="index.php?vista=new_reserva_tenis" class="navbar-item">
                            Tenis
                        </a>

                        <a href="index.php?vista=new_reserva_padel" class="navbar-item">
                            Padel
                        </a>

                    </div>

                </div>
            <?php
            } ?>
            <?php
            if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Monitor") {
                ?>



                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Tipos de Clases
                    </a>

                    <div class="navbar-dropdown">
                        <a href="index.php?vista=new_tipoclases" class="navbar-item">
                            Alta
                        </a>





                        <a href="index.php?vista=clase_list" class="navbar-item">
                            Listado
                        </a>

                    </div>

                </div> <?php
                    }

                        ?>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Clases Grupales
                </a>

                <div class="navbar-dropdown">
         <?php       if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Monitor") {                        ?>

                    <a href="index.php?vista=new_clasegrupal" class="navbar-item">
                        Alta de clase
                    </a>
                    <?php } ?>
                    <a href="index.php?vista=clasegrupal_list" class="navbar-item">
                        Listado
                    </a>


                </div>

            </div>


        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary is-rounded" href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id'] ?>">
                        Mi cuenta
                    </a>
                    <a class="button is-link is-rounded" href="index.php?vista=logout">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>