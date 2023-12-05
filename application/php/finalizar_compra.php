<?php
include("../conexoes/conexao_bd.php");
//RECEBENDO DADOS DO CARRINHO E CLI
$id_cliente = $_POST["id_cliente"];
$id_carrinho = $_POST["id_carrinho"];
$id_endereco = $_POST["id_endereco"];
$valor_frete = (float) str_replace(',', '.', preg_replace('/[^\d,]/', '', $_POST["frete"]));
$valor_total = (float) str_replace(',', '.', preg_replace('/[^\d,]/', '', $_POST["valor_total"]));


//SELECT NO CARRINHO
$query = "SELECT a.*, b.valor_venda FROM tb_item_carrinho AS a INNER JOIN 
tb_item_estoque AS b ON a.id_produto = b.id_produto WHERE id_carrinho =" . $id_carrinho . ";";

$res_carrinho = mysqli_query($conn, $query);

if ($res_carrinho->num_rows > 0) {
    //DATA_HORA ATUAL
    date_default_timezone_set('America/Sao_Paulo'); // Substitua 'America/Sao_Paulo' pela timezone desejada
    $dataHoraAtual = date('Y-m-d H:i:s');


    //CRIA PEDIDO 
    $sql_cria_pedido = "INSERT INTO tb_pedido(id_endereco,id_cliente,preco_total,data_pedido,status_pagamento,frete)
    VALUES (" . $id_endereco . "," . $id_cliente . "," . $valor_total . ",'" . $dataHoraAtual . "',0," . $valor_frete . ") ";
    if (mysqli_query($conn, $sql_cria_pedido)) {
        //Pega o ultimo ID
        $ultimo_id = mysqli_insert_id($conn);


        // Preparar a instrução SQL de inserção para a tabela de itens do pedido
        $sql_insert_pedido = "INSERT INTO tb_item_pedido (id_pedido, id_produto, valor_venda, qtd, tamanho) VALUES ";


        // Loop através dos itens do carrinho
        while ($row = $res_carrinho->fetch_assoc()) {
            // Adicionar valores à instrução SQL de inserção
            $sql_insert_pedido .= "('" . $ultimo_id . "', '" . $row['id_produto'] . "', '" . $row['valor_venda'] . "',"
                . $row['qtd'] . ",'" . $row["tamanho"] . "'), ";
        }

        // Remover a vírgula extra no final da instrução SQL
        $sql_insert_pedido = rtrim($sql_insert_pedido, ", ");

        // Executar a instrução SQL de inserção na tabela de itens do pedido
        if ($conn->query($sql_insert_pedido) === TRUE) {
            //LIMPAR CARRINHO
            $sql_del_carrinho = "DELETE FROM tb_item_carrinho WHERE id_carrinho =" . $id_carrinho . ";";
            if (mysqli_query($conn, $sql_del_carrinho)) {
                //COMPRA REALIZADA
                // Desativa temporariamente a verificação do certificado SSL
                stream_context_set_default(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);

                require_once '../../../vendor/autoload.php';

                $access_token = "TEST-4884739433039271-120107-fa8029f639c5da6c8254ab841d0b9995-219926496";
                MercadoPago\SDK::setAccessToken($access_token);
                $preference = new MercadoPago\Preference();

                $item = new MercadoPago\Item();
                $item->title = 'Compra Lavechia Store';
                $item->quantity = 1;
                $item->unit_price = (float)$valor_total;
                $preference->items  = array($item);


                $preference->back_urls =
                    array(
                        "success" => "https://seusite.com/success",
                        "failure" => "https://seusite.com/failure",
                        "pending" => "https://seusite.com/pending"

                    );

                $preference->notification_url = 'https://seusite.com/notification.php';
                $preference->external_reference = 4545;
                $preference->save();


                $link = $preference->init_point;
                echo $link;
            } else {
                echo "Erro ao limpar carrinho: " . $conn->error;
            }
        } else {
            echo "Erro ao transferir itens: " . $conn->error;
        }
    } else {
        echo "erro";
    }
}
