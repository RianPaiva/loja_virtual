<?php


include("../conexoes/conexao_bd.php");
include("clean_string.php");

// $id_usuario = mysqli_real_escape_string($conn, $_POS["id_usuario"]);
$email = CleanString(mysqli_real_escape_string($conn, $_POST["email"]));
$nome = CleanString(mysqli_real_escape_string($conn, $_POST["nome"]));
$sobrenome = CleanString(mysqli_real_escape_string($conn, $_POST["sobrenome"]));
$status = mysqli_real_escape_string($conn, $_POST["status"]);
$acesso = mysqli_real_escape_string($conn, $_POST["acesso"]);


if ($_POST["metodo"] == "cad_usuario") {


    //VERIFICA SE O EMAIL É VÁLIDO
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "Email inválido";
        die();
    }

    // VERIFICAR SE JÁ FOI CADASTRADO
    $conf_email = "N";

    // CONSULTAS NO BANCO
    $query_email = "SELECT * FROM tb_usuario WHERE email = '" . $email . "' LIMIT 1;";

    // EXECUÇÃO DAS CONSULTAS
    $result_email = mysqli_query($conn, $query_email);

    // CONDICIONAL PARA VALIDAÇÃO DE CNPJ
    if ($result_email->num_rows > 0) {
        $conf_email = "S";
    }

    // // CONDICIONAL PARA VALIDAÇÃO DE RAZAO SOCIAL
    // if ($result_razao->num_rows > 0) {
    //     $conf_razao = "S";
    // }


    // TESTE DE CONFIRMACAO
    if ($conf_email == "S") {
        echo ("EMAIL já cadastrado!");
        die();
    } else {
        $query_usuario = "INSERT INTO tb_usuario(nome, sobrenome, email, status, nivel_acesso) 
        VALUES('" . $nome . "','" . $sobrenome . "','" . $email . "','" . $status . "','" . $acesso . "');";

        // EXECUÇÃO DA CONSULTA
        if (mysqli_query($conn, $query_usuario)) {
            echo "True";
        } else {
            echo mysqli_error($conn);
        }
    }
} 
// elseif ($_POST["metodo"] == "alt_usuario") {

//     //VERIFICA SE CPF/CNPJ É VÁLIDO
//     if (validarCpfCnpj($cnpj)) {
//     } else {
//         echo "CNPJ Inválido";
//         die();
//     }


//     //VERIFICA SE O EMAIL É VÁLIDO
//     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     } else {
//         echo "Email inválido";
//         die();
//     }


//     // VERIFICAR SE JÁ FOI CADASTRADO
//     $conf_cnpj = "N";
//     $conf_razao = "N";

//     // CONSULTAS NO BANCO
//     $query_cnpj = "SELECT * FROM tb_fornecedor WHERE cnpj = '" . $cnpj . "' AND id_fornecedor <> " . $id_fornecedor . " LIMIT 1;";
//     $query_razao = "SELECT * FROM tb_fornecedor WHERE razao_social = '" . $razao_social . "' AND id_fornecedor <> " . $id_fornecedor . " LIMIT 1";

//     // EXECUÇÃO DAS CONSULTAS
//     $result_cnpj = mysqli_query($conn, $query_cnpj);
//     $result_razao = mysqli_query($conn, $query_razao);

//     // CONDICIONAL PARA VALIDAÇÃO DE CNPJ
//     if ($result_cnpj->num_rows > 0) {
//         $conf_cnpj = "S";
//     }

//     // CONDICIONAL PARA VALIDAÇÃO DE RAZAO SOCIAL
//     if ($result_razao->num_rows > 0) {
//         $conf_razao = "S";
//     }


//     // TESTE DE CONFIRMACAO
//     if ($conf_cnpj == "S" && $conf_razao == "S") {
//         echo ("RAZÃO SOCIAL e CNPJ já cadastrados!");
//         die();
//     } else {
//         if ($conf_razao == "S") {
//             echo ("RAZÃO SOCIAL já cadastrada");
//             die();
//         } else {
//             if ($conf_cnpj == "S") {
//                 echo ("CNPJ já cadastrado!");
//                 die();
//             } else {
//                 $query_fornecedor = "UPDATE tb_fornecedor 
//                 SET razao_social = '" . $razao_social . "', 
//                     cnpj = '" . $cnpj . "', 
//                     email = '" . $email . "', 
//                     telefone = '" . $telefone . "', 
//                     id_pais = '" . $pais . "', 
//                     cidade = '" . $cidade . "', 
//                     logradouro = '" . $logradouro . "', 
//                     id_estado = '" . $estado . "', 
//                     complemento = '" . $complemento . "', 
//                     num_endereco = '" . $numero . "', 
//                     `status` = " . $status . "
//                 WHERE id_fornecedor = " . $id_fornecedor . ";";
//                 // EXECUÇÃO DA CONSULTA
//                 if (mysqli_query($conn, $query_fornecedor)) {
//                     echo "True";
//                 } else {
//                     echo mysqli_error($conn);
//                 }
//             }
//         }
//     }
// }