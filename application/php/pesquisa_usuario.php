
<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");

$id_usuario = $_POST["id_usuario"];
$nome = CleanString($_POST["nome"]);
$email = CleanString($_POST["email"]);


$sucesso = "S";
$return = "";

//COMEÇANDO QUERY

$query = "SELECT * FROM tb_usuario WHERE ";


//TESTAR SE TEM ID
if ($id_usuario !== "" && $id_usuario !== null) {
    $query .= "id_usuario = " . $id_usuario . " LIMIT 1;";
} else {
    //SE TIVER NOME
    if ($nome !== "" && $nome !== null) {
        $query .= "nome ='" . $nome . "' LIMIT 1;";
    } else {
        // SE TIVER EMAIL
        if ($email !== "" && $email !== null) {
            $query .= "email ='" . $email . "' LIMIT 1;";
        } else {
            $return = "Informe um NOME para prosseguir!";
            echo $return;
            die();
        }
    }
}



if ($result_query = mysqli_query($conn, $query)) {
    $tbl = $result_query->fetch_assoc();
    $return = $tbl["id_usuario"] . "##";
    $return = $tbl["email"] . "##";
    $return .= $tbl["nome"] . "##";
    $return .= $tbl["sobrenome"] . "##";
    $return .= $tbl["status"] . "##";
    $return .= $tbl["nivel_acesso"] . "##";
} else {
    $sucesso = "N";
}


if ($sucesso == "S") {
    echo "Sucesso" . "##";
    echo $return;
} else {
    echo "Erro ao pesquisar" . "##";
}
