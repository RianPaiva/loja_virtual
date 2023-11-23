<?php
include("../adm/login_adm.php");

if (!isset($_SESSION)) {
    session_start();
}


if (!isset($_SESSION['id_usuario'])) {

    die("Login não foi realizado.<p><a href = \"index.php\">Login</a></p>");
}