<?php
include("../conexoes/conexao_bd.php");
include("./envia_email_novo_usuario.php");

$nome = mysqli_real_escape_string($conn, $_POST["primeiro_nome"]);
$sobrenome = mysqli_real_escape_string($conn, $_POST["sobrenome"]);
$celular = mysqli_real_escape_string($conn, $_POST["celular"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$senha = mysqli_real_escape_string($conn, $_POST["senha"]);
$conf_senha = mysqli_real_escape_string($conn, $_POST["conf_senha"]);
$genero = mysqli_real_escape_string($conn, $_POST["genero"]);

/*
CONFERE SE O USUARIO JÁ EXISTE (EMAIL E CPF)
*/
$conf_email = "N";



//CONFERE EMAIL
$query_email = "SELECT * FROM tb_cliente WHERE email = '" . $email . "' LIMIT 1; ";
$result_email = mysqli_query($conn, $query_email);
if ($result_email->num_rows > 0) {
    $conf_email = "S";
}


//TESTE DO RESULTADO DAS CONSULTAS EMAIL E CPF
if ($conf_email == "S") {
    echo "EMAIL já cadastrado";
    die();
} else {
    //EXECUTANDO QUERY CADASTRO

    $query_cadastro = "INSERT INTO tb_cliente(nome, sobrenome, genero, celular, email, senha) 
    VALUES('" . $nome . "', '" . $sobrenome . "', '" . $genero . "' ,'" . $celular . "', '" . $email . "', '" . $senha . "');";

    if (mysqli_query($conn, $query_cadastro)) {
        //EMAIL CONFIRMAÇÃO
        send_mail($nome, $email);
    } else {
        echo mysqli_error($conn);
    }
}
