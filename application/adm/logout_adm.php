<?php
if (!isset($_SESSION)) {
    session_start();
}


session_destroy();
if(isset($_SESSION['id_usuario'])){
    header("Location: ../adm/login_adm.php");
    exit();

}else{
    header("Location: ../pages/login.php");
    exit();
}

