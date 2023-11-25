<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");


if ($_POST["metodo"] == "cad_prod_estq") {

    $id_prod = $_POST["id"];
    $preco = $_POST["preco"];
    $dt_adicao = strtotime($_POST["dt_adicao"]);
    $formated_date = date("Y-m-d h:i", $dt_adicao);
    $disponivel = $_POST["disponivel"];
    $tamanhos = $_POST["tamanhos"];

    $sql_confere_prod = "SELECT * FROM  tb_item_estoque WHERE id_produto = " . $id_prod . ";";
    $res_confere_prod = mysqli_query($conn, $sql_confere_prod);
    if ($res_confere_prod->num_rows > 0) {
        echo "Produto já cadastrado no estoque, PESQUISE para alterá-lo";
        die();
    } else {
        $sql_prod_estq = "INSERT INTO tb_item_estoque (id_produto, valor_venda, dt_hr_entrada, disponivel, lista_tamanhos) 
        VALUES (" . $id_prod . "," . $preco . ", '" . $formated_date . "', " . $disponivel . ", '" . $tamanhos . "');";

        if (mysqli_query($conn, $sql_prod_estq)) {
            echo "Sucesso";
        } else {
            echo "Erro: " . mysqli_error($conn);
            die();
        }
    }
} elseif ($_POST["metodo"] == "alt_prod_estq") {
    $id_prod = $_POST["id"];
    $preco = $_POST["preco"];
    $dt_adicao = $_POST["dt_adicao"];
    $disponivel = $_POST["disponivel"];
    $tamanhos = $_POST["tamanhos"];

    $sql_update = "UPDATE tb_item_estoque SET valor_venda = " . $preco . ", dt_hr_entrada = '" . $dt_adicao . "', disponivel = " . $disponivel . ",
    tamanhos = '" . $tamanhos . "'  WHERE  id_produto=" . $id . ";";

    if (mysqli_query($conn, $sql_update)) {
        echo "Sucesso";
    } else {
        echo "Erro: " . mysqli_error($conn);
        die();
    }
}
