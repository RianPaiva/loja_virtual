<?php
include("../header_footer/header.php");
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Meu Carrinho </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style_carrinho.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>

    <main class="container-fluid">
        <div class="row meucarrinho">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    CARRINHO
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
                            $sql_carrinho = "SELECT a.*, b.nome_produto, b.local_img, c.valor_venda FROM tb_item_carrinho AS a 
                            INNER JOIN tb_produto AS b ON a.id_produto = b.id_produto 
                            INNER JOIN tb_item_estoque 
                            AS c ON a.id_produto = b.id_produto WHERE a.id_carrinho = 1";
                            $result_carrinho = mysqli_query($conn, $sql_carrinho);
                            if ($result_carrinho->num_rows > 0) {
                                while ($tbl_carrinho = $result_carrinho->fetch_assoc()) {
                                    echo '<tr>
                                    <td>
                                        <div class="product me-3">
                                            <img src="' . $tbl_carrinho["local_img"] . '" style="max-width: 100px;" alt="" />
                                            <div class="info">
                                                <div class="name">
                                                    <h6>' . $tbl_carrinho["nome_produto"] . '</h6>
                                                </div>
                                                <div class="category mb-3">Categoria</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ ' . $tbl_carrinho["valor_venda"] . '</td>
                                    <td>
                                        <div class="qtd ms-3 me-3">
                                            <button><i class="bx bx-minus"></i></button>
                                            <span>2</span>
                                            <button><i class="bx bx-plus"></i></button>
                                        </div>
                                    </td>
                                    <td> R$ 240,00 </td>
                                    <td>
                                        <button class="remove"><i class="bx bx-x"></i></button>
                                    </td>
                                </tr>';
                                }
                            } else {
                            }



                            ?>
                        </tbody>
                    </table>
                </div>

                <aside class="col-lg-3">
                    <div class="box rounded">
                        <header class="text-center">Resumo da compra</header>
                        <div class="info">
                            <div><span>Sub-total</span><span>R$ 418</span></div>
                            <div><span>Frete</span><span>Gratuito</span></div>

                            <div class="col">
                                <input type="text" class="form-control" placeholder="CEP">
                            </div>

                        </div>

                        <footer class="rounded bg-color">
                            <span>Total</span>
                            <span>R$ 418</span>
                        </footer>
                    </div>
                    <button class="rounded">Finalizar Compra</button>
                </aside>
            </div>
        </div>

        <div class="row">
            <hr class="opacity-0 hr-custom">
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
include("../header_footer/footer.php");
?>