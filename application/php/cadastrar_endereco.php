<?php
include("../conexoes/conexao_bd.php");
include("../php/clean_string.php");

$id_cliente = mysqli_real_escape_string($conn, $_POST["id_cliente"]);
$rua = mysqli_real_escape_string($conn, $_POST["rua"]);
$bairro = mysqli_real_escape_string($conn, $_POST["bairro"]);
$cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
$estado = mysqli_real_escape_string($conn, $_POST["estado"]);
$complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
$numero = mysqli_real_escape_string($conn, $_POST["numero"]);

$query_endereco = "INSERT INTO tb_endereco(id_cliente, rua, bairro, cidade, numero, complemento, estado)
    VALUES ('".$id_cliente."','" . $rua . "','" . $bairro . "','" . $cidade . "','" . $numero . "','" . $complemento . "','" . $estado . "');";


if (mysqli_query($conn, $query_endereco)) {
    echo "True";
} else {
    echo mysqli_error($conn);
}