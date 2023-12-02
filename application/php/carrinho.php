<?php
include("../conexoes/conexao_bd.php");


$id_cliente = $_POST["id_cliente"];
$id_carrinho = $_POST["id_carrinho"];
$id_prod = $_POST["id_prod"];
$tamanho = $_POST["tamanho"];
if(isset($_POST["qtd_atual"])){
    $qtd_atual = $_POST["qtd_atual"];
}else{
    $qtd_atual = 0;
}


if($_POST["metodo"] == "incluir_tela_produto"){
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
        // Sua string JSON
        $jsonString = $tbl_disp["lista_tamanhos"];
        // Decodificar o JSON para um array associativo
        $estoque_disponivel = json_decode($jsonString, true);

        $select_conf_carrinho = "SELECT * FROM tb_item_carrinho 
        WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";

        $res_conf = mysqli_query($conn, $select_conf_carrinho);
        if($res_conf->num_rows > 0){
            $tbl_res_conf = $res_conf->fetch_assoc();
            $qtd_atual = $tbl_res_conf["qtd"];
        }else{
            $qtd_atual = 0;
        }

        if ($estoque_disponivel[$tamanho] > ($qtd_atual)) {

            if ($qtd_atual > 0) {
                //SOMA PRODUTO JÁ ESCOLHIDO
                $sql_insert_prod = "UPDATE tb_item_carrinho SET qtd = " . ($qtd_atual + 1) . " 
                WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";
            } else {
                //INSERIR PRODUTO NO CARRINHO
                $sql_insert_prod = "INSERT INTO tb_item_carrinho(id_carrinho,id_produto, tamanho, qtd) VALUES(" . $id_carrinho . "," . $id_prod . ",'" . $tamanho . "',1);";
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



}
elseif ($_POST["metodo"] == "incluir_produto") {
    ///INCLUI ITEM NO CARRINHO///

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
        // Sua string JSON
        $jsonString = $tbl_disp["lista_tamanhos"];

        // Decodificar o JSON para um array associativo
        $estoque_disponivel = json_decode($jsonString, true);
        if ($estoque_disponivel[$tamanho] > ($qtd_atual)) {

            if ($qtd_atual > 0) {
                //SOMA PRODUTO JÁ ESCOLHIDO
                $sql_insert_prod = "UPDATE tb_item_carrinho SET qtd = " . ($qtd_atual + 1) . " 
                WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";
            } else {
                //INSERIR PRODUTO NO CARRINHO
                $sql_insert_prod = "INSERT INTO tb_item_carrinho(id_carrinho,id_produto, tamanho, qtd) VALUES(" . $id_carrinho . "," . $id_prod . ",'" . $tamanho . "',1);";
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
    if ($qtd_atual == 1) {
        //EXCLUI PRODUTO
        $sql_remove_prod = "DELETE FROM tb_item_carrinho 
        WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";
    } else {
        //REMOVE UMA UNIDADE DO CARRINHO
        $sql_remove_prod = "UPDATE tb_item_carrinho SET qtd = " . ($qtd_atual - 1) . " 
                WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";
    }

    if (mysqli_query($conn, $sql_remove_prod)) {
        echo "Sucesso";
    } else {
        echo "Erro ao remover do carrinho: " . mysqli_error($conn);
        die();
    }
} elseif($_POST["metodo"] == "deletar_produto"){
  
        //EXCLUI PRODUTO DO CARRINHO
        $sql_delete_prod = "DELETE FROM tb_item_carrinho 
        WHERE id_carrinho =" . $id_carrinho . " AND id_produto =" . $id_prod . " AND tamanho ='" . $tamanho . "';";   

    if (mysqli_query($conn, $sql_delete_prod)) {
        echo "Sucesso";
    } else {
        echo "Erro ao excluir do carrinho: " . mysqli_error($conn);
        die();
    }
    
}