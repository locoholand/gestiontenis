<?php require "./common/session_start.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include "./common/head.php";
    ?>
</head>

<body>
    <?php
    if (!isset($_GET['vista']) || $_GET['vista'] == "") {
        $_GET['vista'] = "login";
    }

    if (
        is_file("./views/" . $_GET['vista'] . ".php")
        && $_GET['vista'] != "login" && $_GET['vista'] != "404"  && $_GET['vista'] != "register" && $_GET['vista'] != "recoverpass" 
    ) {
        //Cerrar sesion
        if (
            !isset($_SESSION['id']) || $_SESSION['id'] == ''
            || (!isset($_SESSION['user']) || $_SESSION['user'] == '')
        ) {
            include './views/logout.php';
            exit();
        }

        include "./common/navBar.php";
        include "./views/" . $_GET['vista'] . ".php";
        include "./common/script.php";
    } else {
        if ($_GET['vista'] == "login") {
            include "./views/login.php";
        } else if($_GET['vista'] == "register"){
            include "./views/register.php";
        } else if($_GET['vista'] == "recoverpass"){
            include "./views/recoverpass.php";
        }
         else {
            include "./views/404.php";
        }
    }

    ?>
</body>




</html>