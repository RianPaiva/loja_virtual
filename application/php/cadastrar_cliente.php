<?php
include("../conexoes/conexao_bd.php");

$nome = mysqli_real_escape_string($conn, $_POST["primeiro_nome"]);
$sobrenome = mysqli_real_escape_string($conn, $_POST["sobrenome"]);
$cpf = "8";
$celular = mysqli_real_escape_string($conn, $_POST["celular"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$senha = mysqli_real_escape_string($conn, $_POST["senha"]);
$conf_senha = mysqli_real_escape_string($conn, $_POST["conf_senha"]);
$genero = mysqli_real_escape_string($conn, $_POST["genero"]);

/*
CONFERE SE O USUARIO JÁ EXISTE (EMAIL E CPF)
*/
$conf_email = "N";
$conf_cpf = "N";


//CONFERE EMAIL
$query_email = "SELECT * FROM tb_cliente WHERE email = '" . $email . "' LIMIT 1; ";
$result_email = mysqli_query($conn, $query_email);
if ($result_email->num_rows > 0) {
    $conf_email = "S";
}

//CONFERE CPF
$query_cpf = "SELECT * FROM tb_cliente WHERE cpf = '" . $cpf . "' LIMIT 1;";
$result_cpf = mysqli_query($conn, $query_cpf);
if ($result_cpf->num_rows > 0) {
    $conf_cpf = "S";
}


//TESTE DO RESULTADO DAS CONSULTAS EMAIL E CPF
if ($conf_email == "S" && $conf_cpf == "S") {
    echo "EMAIL e CPF já cadastrados!";
    die();
} elseif ($conf_email == "S") {
    echo "EMAIL já cadastrado";
    die();
} elseif ($conf_cpf == "S") {
    echo "CPF á cadastrado!";
    die();
} else {
    //EXECUTANDO QUERY CADASTRO

    $query_cadastro = "INSERT INTO tb_cliente(nome, sobrenome, cpf, genero, celular, email, senha) 
    VALUES('" . $nome . "', '" . $sobrenome . "', '" . $cpf . "', '" . $genero . "' ,'" . $celular . "', '" . $email . "', '" . $senha . "');";

    if (mysqli_query($conn, $query_cadastro)) {
        echo "True";
    } else {
        echo mysqli_error($conn);
    }
}
