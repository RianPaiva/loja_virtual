<?php
include("../conexoes/conexao_bd.php");


if ($_POST["metodo"] == "incluir_produto") {
    ///INCLUI ITEM NO CARRINHO///

    $id_cliente = $_POST["id_cliente"];
    $id_carrinho = $_POST["id_carrinho"];
    $id_prod = $_POST["id_prod"];
    $tamanho = $_POST["tamanho"];


    //VERIFICA SE JÁ TEM CARRINHO
    if (!isset($_POST["id_carrinho"]) || $_POST["id_carrinho"] <= 0) {
        $sql_verifica = "SELECT id_carrinho, id_cliente FROM tb_carrinho WHERE id_cliente = " . $_POST["id_cliente"] . " LIMIT 1;";
        $res_verifica = mysqli_query($conn, $sql_verifica);
        if ($res_verifica->num_rows > 0) {
            $tbl = $res_verifica->fetch_assoc();
            $id_carrinho = $tbl["id_carrinho"];
        } else {
            $sql_create = "INSERT INTO tb_carrinho(id_cliente) VALUES(" . $_POST["id_cliente"] . ");";

            if (mysqli_query($conn, $sql_create)) {
                $sql_get_id = "SELECT * FROM tb_carrinho WHERE id_cliente = " . $_POST["id_cliente"] . " LIMIT 1;";
                $res_get_id = mysqli_query($conn, $sql_get_id);
                if ($res_get_id->num_rows > 0) {
                    $tbl_id = $res_get_id->fetch_assoc();
                    $id_carrinho = $tbl_id["id_carrinho"];
                } else {
                    echo "Problemas para buscar o ID do Cliente";
                    die();
                }
            } else {
                echo mysqli_error($conn);
                die();
            }
        }
    }

    //VERIFICA DISPONIBILIDADE
    $sql_prod_disp = "SELECT * FROM tb_item_estoque WHERE id_produto = " . $id_prod . " AND disponivel = 1;";
    $res_disp = mysqli_query($conn, $sql_prod_disp);
    if ($res_disp->num_rows > 0) {
        $tbl_disp = $res_disp->fetch_assoc();
        if ($tbl_disp["tamanhos"] > ($qtd_atual + 1)) {

            if($qtd_atual > 0){
                //SOMA PRODUTO JÁ ESCOLHIDO
                $sql_insert_prod = "UPDATE tb_item_carrinho SET qtd = ".($qtd_atual + 1)." 
                WHERE id_carrinho =".$id_carrinho." AND id_produto =".$id_produto." AND tamanho =".$tamanho.";";
            }else{
                 //INSERIR PRODUTO NO CARRINH
                $sql_insert_prod = "INSERT INTO tb_item_carrinho(id_carrinho,id_produto, tamanho) VALUES(" . $id_carrinho . "," . $id_prod . ",'" . $tamanho . "');";
            }           
            
            if (mysqli_query($conn, $sql_insert_prod)) {
                echo "Sucesso";
            } else {
                echo "Erro ao inserir no carrinho: " . mysqli_error($conn);
                die();
            }
        } else {
            echo "A quantidade em estoque não é suficiente!";
        }
    } else {
        echo "A quantidade em estoque não é suficiente!";
    }
} elseif ($_POST["metodo"] == "remover_produto") {
    //REMOVE ITEM DO CARRINHO


} elseif ($_POST["metodo"] == "limpar_carrinho") {
    //LIMPA TODOS ITENS DO CARRINHO


}
