<?php
include("../conexoes/conexao_bd.php");

// ARMAZENAMENTO DOS DADOS EM VARIÁVEIS
$razao_social = mysqli_real_escape_string($conn, $_POST["razao_social"]); 
$cnpj = mysqli_real_escape_string($conn, $_POST["cnpj"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]); 
$telefone = mysqli_real_escape_string($conn, $_POST["telefone"]);
$pais = mysqli_real_escape_string($conn, $_POST["pais"]);
$estado = mysqli_real_escape_string($conn, $_POST["estado"]);
$cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
$logradouro = mysqli_real_escape_string($conn, $_POST["cidade"]);
$complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
$numero = mysqli_real_escape_string($conn, $_POST["numero"]);

// VERIFICAO COM CHAVE DO BANCO
$conf_cnpj = "N";

// CONSULTA NO BANCO
$query_cnpj = "SELECT * FROM tb_fornecedor WHERE cnpj = '". $cnpj ."' LIMIT 1;";

// EXECUÇÃO DA CONSULTA
$result_cnpj = mysqli_query($conn,$query_cnpj);

// CONDICIONAL PARA VALIDAÇÃO
if($result_cnpj->num_rows > 0){
    $conf_cnpj = "S";
}

// TESTE DE CONFIRMACAO
if($conf_cnpj == "S"){
    echo("CNPJ já cadastrado!");

}else{

    // CONSULTA PARA REGISTRAR DADOS
    $query_fornecedor = "INSERT INTO tb_fornecedor(razao_social, cnpj, email, telefone, pais, cidade, logradouro, complemento ,num_endereco) 
    VALUES('". $razao_social . "', '". $cnpj. "', '". $email. "', '". $telefone. "', '". $pais. "', '". $cidade. "', '". $logradouro. "', '". $complemento. "', '". $numero. "');";

    // EXECUÇÃO DA CONSULTA
    if(mysqli_query($conn,$query_fornecedor)){
        echo "True";
    }else{
        mysqli_error($conn);
    }
}
