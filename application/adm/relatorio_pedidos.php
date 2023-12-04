<?php
include("../header_footer/header.php");
?>

<link rel="stylesheet" href="../css/style_relatorio_vendas.css">




<div class="container-fluid mt-5">

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                REGISTROS DE VENDAS
            </div>
            </p>
        </div>
    </div>

    <div class="row text-center d-flex justify-content-around overflow-y-scroll row-custom me-1 mb-3">

        <div class="col-12 row-custom mb-4">

            <table>
                <thead>
                    <tr>
                        <th>N° Pedido</th>
                        <th> Data do Pedido </th>
                        <th>Cliente</th>
                        <th>Endereço</th>
                        <th>Total</th>
                        <th>Frete</th>
                        <th> Visualizar Pedido </th>
                        <th> Status </th>
                    </tr>
                </thead>


                <?php

                $query = "SELECT a.*, b.id_produto, b.valor_venda, b.qtd, b.tamanho, c.rua, c.bairro, c.cidade, c.estado, c.numero, c.cep FROM tb_pedido AS a
                    INNER JOIN tb_item_pedido AS b ON a.id_pedido = b.id_pedido
                    INNER JOIN tb_endereco AS c ON a.id_endereco = c.id_endereco; ";

                $result = mysqli_query($conn, $query);

                while ($tbl = $result->fetch_assoc()) {

                    // VALOR DO FRENTE
                    $frete = 'R$ ' . '' . $tbl['frete'] . '';

                    // CONVERTENDO ID DO ESTADO PARA NOME
                    $query_estado = "SELECT nome FROM tb_estado_br WHERE id_estado = " . $tbl['estado'] . " LIMIT 1;";
                    $result_estado = mysqli_query($conn, $query_estado);
                    $tbl_estado = $result_estado->fetch_assoc();
                    $estado = $tbl_estado["nome"];

                    // CONCATENAÇÃO DOS CAMPOS DE ENDERÇO
                    $endereco = $tbl["rua"] . ', ' . $tbl["bairro"] . ', ' . $tbl["numero"] . ', ' . $tbl["cidade"] . ', ' . $estado . ', ' . $tbl["cep"];

                    // CONVERSÃO DE ID PRA NOME COMPLETO DO CLIENTE
                    $query_cliente = "SELECT nome, sobrenome FROM tb_cliente WHERE id_cliente = " . $tbl['id_cliente'] . " LIMIT 1;";
                    $result_cliente = mysqli_query($conn, $query_cliente);
                    $tbl_cliente = $result_cliente->fetch_assoc();
                    $nome = $tbl_cliente['nome'] . ' ' . $tbl_cliente['sobrenome'];

                    // CÁLCULO DE VALOR TOTAL 
                    $total = $tbl['qtd'] * $tbl["valor_venda"];

                    echo '
                    <tr class="ms-2 mt-2 ms-2">
                        <td>
                        ' . $tbl["id_produto"] . '
                        </td>

                        <td>
                        ' . $tbl["data_pedido"] . '
                        </td>  
                        
                        <td>                        
                        ' . $nome . '
                        </td>  
                        
                        <td>
                        ' . $endereco . '
                        </td> 
                        
                        <td>
                        R$ ' . $total . '
                        </td>  

                        <td>
                        ' . $frete . '
                        </td>  
    
    
                        <td>
                        <button type="button" class="btn btn-success mt-1"> ABRIR PEDIDO </button>
                        </td>

                        <td>
                            Aprovado
                        </td>
                    </tr>
    
                ';
                }
                ?>

                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
include("../header_footer/footer.php");
?>