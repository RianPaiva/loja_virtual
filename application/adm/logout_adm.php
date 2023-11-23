<?php
if (!isset($_SESSION)) {
    session_start();
}


session_destroy();
header("Location: ../adm/login_adm.php");
