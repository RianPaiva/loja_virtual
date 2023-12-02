<?php
include("../conexoes/conexao_bd.php");
include("../php/clean_string.php");

$id_clinente = "";
$rua = mysqli_real_escape_string($conn, $_POST["rua"]);
$bairro = mysqli_real_escape_string($conn, $_POST["bairro"]);
$cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
$estado = mysqli_real_escape_string($conn, $_POST["estado"]);
$complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
$numero = mysqli_real_escape_string($conn, $_POST["numero"]);



$query_endereco = "UPDATE tb_endereco SET 
    rua ='" . $rua . "', 
    bairro ='" . $bairro . "', 
    cidade = '" . $cidade . "', 
    numero ='" . $numero . "', 
    complemento ='" . $complemento . "', 
    estado = '" . $estado . "' 
WHERE id_cliente = 1;";

if (mysqli_query($conn, $query_endereco)) {

    echo "True";
} else {
    echo mysqli_error($conn);
}
