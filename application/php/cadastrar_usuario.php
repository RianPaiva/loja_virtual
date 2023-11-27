<?php


include("../conexoes/conexao_bd.php");
include("clean_string.php");

$id_usuario = mysqli_real_escape_string($conn, $_POST["id_usuario"]);
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
} elseif ($_POST["metodo"] == "alt_usuario") {

    // //VERIFICA SE CPF/CNPJ É VÁLIDO
    // if (validarCpfCnpj($cnpj)) {
    // } else {
    //     echo "CNPJ Inválido";
    //     die();
    // }


    //VERIFICA SE O EMAIL É VÁLIDO
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "Email inválido";
        die();
    }


    $conf_email = "N";

    // CONSULTAS NO BANCO
    $query_email = "SELECT * FROM tb_usuario WHERE email = '" . $email . "' AND id_usuario <>'" . $id_usuario . "' LIMIT 1;";

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
        $query_usuario = "UPDATE tb_usuario
                SET email = '" . $email . "', 
                    nome = '" . $nome . "', 
                    sobrenome = '" . $sobrenome . "', 
                    `status` = '" . $status . "', 
                    nivel_acesso = '" . $acesso . "'
                WHERE id_usuario = " . $id_usuario . ";";
        // EXECUÇÃO DA CONSULTA
        if (mysqli_query($conn, $query_usuario)) {
            echo "True";
        } else {
            echo mysqli_error($conn);
        }
    }
}
