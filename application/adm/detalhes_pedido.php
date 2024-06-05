<?php
include("../header_footer/header.php");
?>



<link rel="stylesheet" href="../css/style_detalhes_pedido.css">

<div class="container-fluid mt-5">


    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                DETALHES DO PEDIDO: #022
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2 mt-4">
            <label for="pesquisa_pedido"  class="form-label">ID do Pedido</label>
            <input type="text" class="form-control form-border" oninput="handleInput(event)" id="pesquisa_pedido">
            <div id="pesquisaPedido" class="list-group"></div>
        </div>

        <div class="col-md-7 hstack gap-3 ms-3 ms-3 mb-1">
            <input type="hidden" id="id_fornecedor">
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary" id="btn_pesquisar" value="  Pesquisar  ">
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-danger" id="btn_limpar" value="  Limpar  ">
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-success" id="btn_cadastrar" value="  Cadastrar  ">
            </div>
        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <!-- Formulário De Cadastro Do Fornecedor -->
    <div class="container-fluid pt-4 pb-5 bg-custom">

        <form id="form_produto" class="row justify-content-center">

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="dt_adicao" class="form-label"> Data do Pedido </label>
                    <input type="datetime-local" name="data_pedido" id="dt_pedido" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="preco" class="form-label"> Status Pedido </label>
                    <select name="disponivel" id="status_pedido" class="form-select" required>
                        <option selected></option>
                        <option value="0">Aguardando Pagamento</option>
                        <option value="1">Em Separação</option>
                        <option value="2">Despachado</option>
                    </select>
                </div>

            </div>
            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="Cliente" class="form-label"> Cliente </label>
                    <input type="text" name="Cliente" id="cliente" oninput="handleInput(event)" class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="preco" class="form-label"> Valor Total </label>
                    <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
                </div>

            </div>

            <div class="row justify-content-center">


                <div class="col-md-3">

                    <label for="disponivel" class="form-label"> Status do Pagamento </label>
                    <select name="disponivel" id="disponivel" class="form-select" Frequired>
                        <option selected></option>
                        <option value="1">Aprovado</option>
                        <option value="0">Não aprovado</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="dt_entrega" class="form-label"> Finalizado Em </label>
                    <input type="datetime-local" name="data prevista entrega" id="dt_entrega" class="form-control" required>
                </div>

            </div>

            <div class="row text-center d-flex justify-content-around mt-5">

                <div class="col-lg-8 overflow-y-scroll row-custom mb-4 bg-white">

                    <table>
                        <thead>
                            <tr>
                                <th class="prod">Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            //SELECT PRODUTOS NO CARRINHO
                            $sql_carrinho = "SELECT a.*, b.nome_produto, b.local_img, c.valor_venda 
            FROM tb_item_carrinho AS a 
            INNER JOIN tb_produto AS b ON a.id_produto = b.id_produto 
            INNER JOIN tb_item_estoque AS c ON a.id_produto = c.id_produto 
            WHERE a.id_carrinho = 1";
                            $result_carrinho = mysqli_query($conn, $sql_carrinho);
                            if ($result_carrinho->num_rows > 0) {
                                $total = 0;
                                $num_itens = 0;
                                while ($tbl_carrinho = $result_carrinho->fetch_assoc()) {
                                    $sub_total = ($tbl_carrinho["qtd"] * $tbl_carrinho["valor_venda"]);
                                    $total += $sub_total;
                                    echo '<tr>
                    <td>
                        <div class="product me-3">
                            <img src="' . $tbl_carrinho["local_img"] . '" style="max-width: 100px;" alt="" />
                            <div class="info">
                                <div class="name">
                                    <h6>' . $tbl_carrinho["nome_produto"] . '</h6>
                                </div>
                                <div class="category mb-3">Tamanho: ' . $tbl_carrinho["tamanho"] . '</div>
                            </div>
                        </div>
                    </td>
                    <td>R$ ' . number_format($tbl_carrinho["valor_venda"], 2, ',', '.') . '</td>
                    <td>
                        <div class="qtd ms-3 me-3">
                            <button onclick="remove_produto(' . $tbl_carrinho["id_produto"] . ',1,' . $tbl_carrinho["tamanho"] . ',' . $tbl_carrinho["qtd"] . ',1)"><i class="bx bx-minus"></i></button>
                            <span>' . $tbl_carrinho["qtd"] . '</span>
                            <button onclick="add_produto(' . $tbl_carrinho["id_produto"] . ',1,' . $tbl_carrinho["tamanho"] . ',' . $tbl_carrinho["qtd"] . ',1)"><i class="bx bx-plus"></i></button>
                        </div>
                    </td>
                    <td> R$ ' . number_format($sub_total, 2, ',', '.') . '</td>
                </tr>';
                                    $num_itens += $tbl_carrinho["qtd"];
                                }
                            } else {
                                // echo "<h1>Carrinho Vazio</h1>";
                                $num_itens = 0;
                                $total = 0;
                            }



                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </form>
    </div>
    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 0px solid transparent">
    </div>

</div>














<?php
include("../header_footer/footer.php");
?>