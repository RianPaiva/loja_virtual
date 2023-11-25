<?php

if (!isset($_SESSION)) {
    session_start();
}


if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['id_cliente'])) {

    die("Login não foi realizado.<p><a href = \"login_adm.php\">Login</a></p>");
}