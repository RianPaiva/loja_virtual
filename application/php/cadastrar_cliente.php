<?php
include("../conexoes/conexao_bd.php");

$nome = mysqli_real_escape_string($conn, $_POST["primeiro_nome"]);
$sobrenome = mysqli_real_escape_string($conn,$_POST["sobrenome"]);
$telefone = mysqli_real_escape_string($conn,$_POST["telefone"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$senha = mysqli_real_escape_string($conn,$_POST["senha"]);
$conf_senha= mysqli_real_escape_string($conn,$_POST["conf_senha"]);
$genero = mysqli_real_escape_string($conn,$_POST["genero"]);

/*
CONFERE SE O USUARIO JÁ EXISTE (EMAIL)
CADASTRO OU ALERTA
*/

//QUERY CONFERE
$query_conf = "SELECT * FROM tb_cliente WHERE email = '".$email."' LIMIT 1;";
//EXECUTANDO QUERY
$conf_result = mysqli_query($conn, $query_conf);

if($conf_result->num_rows > 0){
    echo "Email Cadastrado";
    die();
    //EMAIL JÁ CADASTRADO, POR FAVOR FAÇA LOGIN.....
}else{
    //CADASTRO
    $query_cadastro = "INSERT INTO tb_cliente(nome, sobrenome, cpf, genero, celular, email, senha, status) 
    VALUES('".$nome."', '".$sobrenome."', '".$cpf."', '".$genero."' ,'".$celular."', '".$email."', '".$senha."', 1);" ;
}
?>