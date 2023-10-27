<?php
include("../conexoes/conexao_bd.php");

$nome_produto = $_POST("nome_produto");

$sucesso = "S";
$return ="";

$query_produto = "SELECT * FROM tb_produto WHERE nome_produto = '".$nome_produto."';";



if ($result_query = mysqli_query($conn, $query_produto) ){
    $tbl = $result_query->fetch_assoc();

    $return .= $tbl["nome_produto"] .  "##";
    $return .= $tbl["fornecedor"] .  "##";
    $return .= $tbl["categoria"] .  "##";
    $return .= $tbl["genero"] .  "##";
    $return .= $tbl["imagem"] .  "##";
    $return .= $tbl["descricao"] .  "##";
}else{
    $sucesso = "N";
}


if ($sucesso === "S"){
    echo "Sucesso" . "##";
    echo $return;
}


// Deu errado  / Tentar arrumar sem pedir ajuda
?>