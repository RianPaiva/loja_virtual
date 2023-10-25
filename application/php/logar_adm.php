<?php

include("../conexoes/conexao_bd.php");


$email = mysqli_real_escape_string($conn, $_POST["email"]);
$senha = mysqli_real_escape_string($conn, $_POST["senha"]);

$conf_email = "N";
$conf_senha = "N";

$query_email = "SELECT * FROM tb_usuarios WHERE email = '".$email."' LIMIT 1;";
$quey_senha = "SELECT * FROM tb_usuarios WHERE senha = '".$senha."' LIMIT 1;";


$result_email = mysqli_query($conn, $query_email);
$result_senha = mysqli_query($conn, $query_senha);


if($result_email->num_rows > 0){
    $conf_email = "S";
}

if($result_senha->num_rows > 0){
    $conf_senha = "S";
}

if($conf_email !== "S" && $conf_senha === "S"){
    echo ("EMAIL e SENHA inválidos");
}else{
    if($conf_email !== "S"){
        echo ("EMAIL inválido");
    }else{
        if($conf_senha !== "S"){
            echo ("SENHA inválida");
        }else{
            echo "ADM";

        }
    }
}

?>