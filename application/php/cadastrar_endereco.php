<?php
include("../conexoes/conexao_bd.php");
include("../php/clean_string.php");




if ($_POST["metodo"] == "cad_endereco") {
    $id_cliente = mysqli_real_escape_string($conn, $_POST["id_cliente"]);
    $rua = mysqli_real_escape_string($conn, $_POST["rua"]);
    $bairro = mysqli_real_escape_string($conn, $_POST["bairro"]);
    $cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
    $estado = mysqli_real_escape_string($conn, $_POST["estado"]);
    $complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
    $numero = mysqli_real_escape_string($conn, $_POST["numero"]);

    $query_endereco = "INSERT INTO tb_endereco(id_cliente, rua, bairro, cidade, numero, complemento, estado)
    VALUES ('" . $id_cliente . "','" . $rua . "','" . $bairro . "','" . $cidade . "','" . $numero . "','" . $complemento . "','" . $estado . "');";


    if (mysqli_query($conn, $query_endereco)) {
        echo "True";
    } else {
        echo mysqli_error($conn);
    }
} elseif ($_POST["metodo"] == "buscar_endereco") {
    $sql_busca = "SELECT * FROM tb_endereco WHERE id_endereco =" . $_POST["id_endereco"] . ";";
    $result_endereco = mysqli_query($conn, $sql_busca);

    if ($result_endereco->num_rows > 0) {
        $tbl_endereco = $result_endereco->fetch_assoc();
        echo "Sucesso" . "##";
        echo $tbl_endereco["rua"] . "##";
        echo $tbl_endereco["bairro"] . "##";
        echo $tbl_endereco["cidade"] . "##";
        echo $tbl_endereco["estado"] . "##";
        echo $tbl_endereco["numero"] . "##";
        echo $tbl_endereco["complemento"] . "##";
    }
} elseif ($_POST["metodo"] == "alterar_endereco") {

    $id_endereco = mysqli_real_escape_string($conn, $_POST["id_endereco"]);
    $rua = mysqli_real_escape_string($conn, $_POST["rua"]);
    $bairro = mysqli_real_escape_string($conn, $_POST["bairro"]);
    $cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
    $estado = mysqli_real_escape_string($conn, $_POST["estado"]);
    $complemento = mysqli_real_escape_string($conn, $_POST["complemento"]);
    $numero = mysqli_real_escape_string($conn, $_POST["numero"]);

    // Montar a instrução SQL de atualização
    $sql = "UPDATE tb_endereco SET
        rua = '$rua',
        bairro = '$bairro',
        cidade = '$cidade',
        estado = '$estado',
        complemento = '$complemento',
        numero = '$numero'
        WHERE id_endereco = $id_endereco";

    // Executar a consulta
    if (mysqli_query($conn, $sql)) {
        echo "True";
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }
}
