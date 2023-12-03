<?php
include("../header_footer/header.php");
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Meu Carrinho </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style_carrinho.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>

    <main class="container-fluid">
        <div class="row meucarrinho">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    N° DE PEDIDO #
                </div>
                </p>
            </div>

            <div class="row text-center d-flex justify-content-around">

                <div class="col-lg-8 ms-3 overflow-y-scroll row-custom mb-4">

                    <table>
                        <thead>
                            <tr>
                                <th class="prod">Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th>-</th>
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
                                    <td>
                                        <button onclick="del_produto(' . $tbl_carrinho["id_produto"] . ',1,' . $tbl_carrinho["tamanho"] . ',' . $tbl_carrinho["qtd"] . ',1)" class="remove"><i class="bx bx-x"></i></button>
                                    </td>
                                </tr>';
                                    $num_itens += $tbl_carrinho["qtd"];
                                }
                            } else {
                                echo "<h1>Carrinho Vazio</h1>";
                                $num_itens = 0;
                                $total = 0;
                            }



                            ?>
                        </tbody>
                    </table>

                </div>


                <aside class="col-lg-3">
                    <div class="box rounded">
                        <header class="text-center">Resumo da compra</header>
                        <div class="info">
                            <div><span>Total itens</span><span>
                                    <?php echo ($num_itens); ?>
                                </span></div>
                            <div><span>Sub-total</span><span>
                                    <?php echo "R$ " . number_format($total, 2, ',', '.'); ?>
                                </span></div>
                            <div><span>Frete</span><label id="valor_frete">-</label></div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" oninput="mascaraCEP(this)" id="cep"
                                    placeholder="CEP" maxlength="9">
                            </div>

                            <div class="row">
                                <div class="calcular-button d-flex text-center">
                                    <input type="hidden" id="qtd_itens" value="<?php echo ($num_itens); ?>">
                                    <input type="submit" class="btn calcular" id="btn_frete" value="Calcular">
                                </div>
                            </div>

                        </div>

                        <footer class="rounded bg-color">
                            <span>Total</span>
                            <span>
                                <?php echo "R$ " . number_format($total, 2, ',', '.'); ?>
                            </span>
                        </footer>
                    </div>
                </aside>
            </div>
        </div>

        <div class="row">
            <hr class="opacity-0 hr-custom">
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
<script src="../js/carrinho.js"></script>
<script src="../js/masks.js"></script>

<?php
include("../header_footer/footer.php");
?>