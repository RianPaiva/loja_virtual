<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");
include("valida_cpf_cnpj.php");

// ARMAZENAMENTO DOS DADOS EM VARIÁVEIS
$id_fornecedor = mysqli_real_escape_string($conn, $_POST["id_fornecedor"]);
$razao_social = CleanString(mysqli_real_escape_string($conn, $_POST["razao_social"]));
$cnpj =  CleanCnpj(mysqli_real_escape_string($conn, $_POST["cnpj"]));
$email = CleanString(mysqli_real_escape_string($conn, $_POST["email"]));
$telefone = RemoveSpecialChar(mysqli_real_escape_string($conn, $_POST["telefone"]));
$pais = mysqli_real_escape_string($conn, $_POST["pais"]);
$estado = mysqli_real_escape_string($conn, $_POST["estado"]);
$cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
$logradouro = CleanString(mysqli_real_escape_string($conn, $_POST["logradouro"]));
$complemento = CleanString(mysqli_real_escape_string($conn, $_POST["complemento"]));
$numero = mysqli_real_escape_string($conn, $_POST["numero"]);
$status = mysqli_real_escape_string($conn, $_POST["status"]);


if ($_POST["metodo"] == "cad_fornecedor") {

    //VERIFICA SE CPF/CNPJ É VÁLIDO
    if (validarCpfCnpj($cnpj)) {
    } else {
        echo "CNPJ Inválido";
        die();
    }

    //VERIFICA SE O EMAIL É VÁLIDO
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "Email inválido";
        die();
    }

    // VERIFICAR SE JÁ FOI CADASTRADO
    $conf_cnpj = "N";
    $conf_razao = "N";

    // CONSULTAS NO BANCO
    $query_cnpj = "SELECT * FROM tb_fornecedor WHERE cnpj = '" . $cnpj . "' LIMIT 1;";
    $query_razao = "SELECT * FROM tb_fornecedor WHERE razao_social = '" . $razao_social . "' LIMIT 1";

    // EXECUÇÃO DAS CONSULTAS
    $result_cnpj = mysqli_query($conn, $query_cnpj);
    $result_razao = mysqli_query($conn, $query_razao);

    // CONDICIONAL PARA VALIDAÇÃO DE CNPJ
    if ($result_cnpj->num_rows > 0) {
        $conf_cnpj = "S";
    }

    // CONDICIONAL PARA VALIDAÇÃO DE RAZAO SOCIAL
    if ($result_razao->num_rows > 0) {
        $conf_razao = "S";
    }


    // TESTE DE CONFIRMACAO
    if ($conf_cnpj == "S" && $conf_razao == "S") {
        echo ("RAZÃO SOCIAL e CNPJ já cadastrados!");
        die();
    } else {
        if ($conf_razao == "S") {
            echo ("RAZÃO SOCIAL já cadastrada");
            die();
        } else {
            if ($conf_cnpj == "S") {
                echo ("CNPJ já cadastrado!");
                die();
            } else {
                $query_fornecedor = "INSERT INTO tb_fornecedor(razao_social, cnpj, email, telefone, id_pais, cidade, logradouro, id_estado, complemento ,num_endereco, `status`) 
            VALUES('" . $razao_social . "', '" . $cnpj . "', '" . $email . "', '" . $telefone . "', '" . $pais . "', '" . $cidade . "', '" . $logradouro . "', '" . $estado . "', '" . $complemento . "', '" . $numero . "'," . $status . ");";

                // EXECUÇÃO DA CONSULTA
                if (mysqli_query($conn, $query_fornecedor)) {
                    echo "True";
                } else {
                    mysqli_error($conn);
                }
            }
        }
    }
} elseif ($_POST["metodo"] == "alt_fornecedor") {

    //VERIFICA SE CPF/CNPJ É VÁLIDO
    if (validarCpfCnpj($cnpj)) {
    } else {
        echo "CNPJ Inválido";
        die();
    }


    //VERIFICA SE O EMAIL É VÁLIDO
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "Email inválido";
        die();
    }


    // VERIFICAR SE JÁ FOI CADASTRADO
    $conf_cnpj = "N";
    $conf_razao = "N";

    // CONSULTAS NO BANCO
    $query_cnpj = "SELECT * FROM tb_fornecedor WHERE cnpj = '" . $cnpj . "' AND id_fornecedor <> " . $id_fornecedor . " LIMIT 1;";
    $query_razao = "SELECT * FROM tb_fornecedor WHERE razao_social = '" . $razao_social . "' AND id_fornecedor <> " . $id_fornecedor . " LIMIT 1";

    // EXECUÇÃO DAS CONSULTAS
    $result_cnpj = mysqli_query($conn, $query_cnpj);
    $result_razao = mysqli_query($conn, $query_razao);

    // CONDICIONAL PARA VALIDAÇÃO DE CNPJ
    if ($result_cnpj->num_rows > 0) {
        $conf_cnpj = "S";
    }

    // CONDICIONAL PARA VALIDAÇÃO DE RAZAO SOCIAL
    if ($result_razao->num_rows > 0) {
        $conf_razao = "S";
    }


    // TESTE DE CONFIRMACAO
    if ($conf_cnpj == "S" && $conf_razao == "S") {
        echo ("RAZÃO SOCIAL e CNPJ já cadastrados!");
        die();
    } else {
        if ($conf_razao == "S") {
            echo ("RAZÃO SOCIAL já cadastrada");
            die();
        } else {
            if ($conf_cnpj == "S") {
                echo ("CNPJ já cadastrado!");
                die();
            } else {
                $query_fornecedor = "UPDATE tb_fornecedor 
                SET razao_social = '" . $razao_social . "', 
                    cnpj = '" . $cnpj . "', 
                    email = '" . $email . "', 
                    telefone = '" . $telefone . "', 
                    id_pais = '" . $pais . "', 
                    cidade = '" . $cidade . "', 
                    logradouro = '" . $logradouro . "', 
                    id_estado = '" . $estado . "', 
                    complemento = '" . $complemento . "', 
                    num_endereco = '" . $numero . "', 
                    `status` = " . $status . "
                WHERE id_fornecedor = " . $id_fornecedor . ";";
                // EXECUÇÃO DA CONSULTA
                if (mysqli_query($conn, $query_fornecedor)) {
                    echo "True";
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
    }
}
