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

// VARIAVEL PARA VERIFICAÇÃO 
$conf_cnpj = "N";
$conf_razao = "N";

// CONSULTAS NO BANCO
$query_cnpj = "SELECT * FROM tb_fornecedor WHERE cnpj = '". $cnpj ."' LIMIT 1;";
$query_razao = "SELECT * FROM tb_fornecedor WHERE razao_social = '" .$razao_social . "' LIMIT 1";

// EXECUÇÃO DAS CONSULTAS
$result_cnpj = mysqli_query($conn,$query_cnpj);
$result_razao =mysqli_query($conn, $query_razao);

// CONDICIONAL PARA VALIDAÇÃO DE CNPJ
if($result_cnpj->num_rows > 0){
    $conf_cnpj = "S";
}

// CONDICIONAL PARA VALIDAÇÃO DE RAZAO SOCIAL
if($result_razao->num_rows > 0){
    $conf_razao = "S";
}


// TESTE DE CONFIRMACAO
if($conf_cnpj == "S" && $conf_razao == "S"){
    echo("RAZÃO SOCIAL e CNPJ já cadastrados!");
    die();
}else{
    if($conf_razao == "S"){
        echo("RAZÃO SOCIAL já cadastrada");
        die();
    }else{
        if($conf_cnpj == "S"){
            echo("CNPJ já cadastrado!");
            die();
        }else{
            $query_fornecedor = "INSERT INTO tb_fornecedor(razao_social, cnpj, email, telefone, pais, cidade, logradouro, complemento ,num_endereco) 
            VALUES('". $razao_social . "', '". $cnpj. "', '". $email. "', '". $telefone. "', '". $pais. "', '". $cidade. "', '". $logradouro. "', '". $complemento. "', '". $numero. "');";
        
            // EXECUÇÃO DA CONSULTA
            if(mysqli_query($conn,$query_fornecedor)){
                echo "True";
            }else{
                mysqli_error($conn);
            }
        }
    }
}


// // TESTE DE CONFIRMACAO
// if($conf_cnpj == "S"){
//     echo("CNPJ já cadastrado!");

// }else{

//     // CONSULTA PARA REGISTRAR DADOS
//     $query_fornecedor = "INSERT INTO tb_fornecedor(razao_social, cnpj, email, telefone, pais, cidade, logradouro, complemento ,num_endereco) 
//     VALUES('". $razao_social . "', '". $cnpj. "', '". $email. "', '". $telefone. "', '". $pais. "', '". $cidade. "', '". $logradouro. "', '". $complemento. "', '". $numero. "');";

//     // EXECUÇÃO DA CONSULTA
//     if(mysqli_query($conn,$query_fornecedor)){
//         echo "True";
//     }else{
//         mysqli_error($conn);
//     }
// // }