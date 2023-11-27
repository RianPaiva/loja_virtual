<?php
include("../header_footer/header.php");

if (isset($_GET["id_prod"])) {
    $sql_busca = "SELECT a.*, b.local_img, b.nome_produto FROM tb_item_estoque AS a 
    INNER JOIN tb_produto AS b 
    ON a.id_produto = b.id_produto 
    WHERE a.id_produto = " . $_GET["id_prod"] . "  AND a.disponivel = 1";
    $res_prod = mysqli_query($conn, $sql_busca);
    if ($res_prod->num_rows > 0) {
        $tbl = $res_prod->fetch_assoc();
        $main_img = $tbl["local_img"];
        $nome_prod = $tbl["nome_produto"];
        $valor = $tbl["valor_venda"];
        $json_tamanhos = $tbl["lista_tamanhos"];
    } else {
        echo mysqli_error($conn);
    }
} else {
}

?>


<style>
    a {
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="../css/style_produto.css">
<script src="../js/produto.js"></script>

<div class="clearfix"></div>

<div class="container-fluid">

    <div class="container align-items-center">

        <div class="row justify-content-center">

            <!-- Coluna Imagem do Produto -->

            <div class="col-xxl-8">

                <div class="card card-produto ms-5 me-5 mt-5 pt-5">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="images p-5">
                                <div class="row justify-content-center">

                                    <img class="img-fluid" id="main-image" src="<?php echo ($main_img); ?>">

                                </div>
                                <div class="row mt-8">
                                    <div class="col col-custom thumbnail mt-5">
                                        <img class="line-check radio" onclick="change_image(this)" src="<?php echo ($main_img); ?>" height="80" width="80">
                                    </div>
                                    <div class="col col-custom thumbnail mt-5">

                                        <img class="line-check radio" onclick="change_image(this)" src="<?php echo ($main_img); ?>" height="80" width="80">
                                    </div>
                                    <div class="col col-custom thumbnail mt-5">
                                        <img class="line-check radio" onclick="change_image(this)" src="<?php echo ($main_img); ?>" height="80" width="80">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Fim Coluna Imagem do Produto -->

            <!-- Coluna Descrição do Produto -->

            <div class="col-sm-4 mt-5 mb-5">

                <!-- Descrição do Produto -->

                <div class="col mt-5 box-info">

                    <div class="row ms-2 mt-5 nome-produto">
                        <p> <?php echo ($nome_prod); ?> </p>
                    </div>
                    <div class="row ms-2 mt-1 valor-produto">
                        <p><?php echo ($valor); ?></p>
                    </div>

                    <!-- Fim Descrição do Produto -->

                    <!-- Escolha de tamanho do Tênis -->

                    <div class="row ms-2 mt-2">
                        <p class="tamanho">Escolha o tamanho:</p>
                    </div>

                    <div class="row ms-2 d-flex flex-row">

                        <div class="sizes mt-1 mb-3">
                            <?php
                            // Decodificar o JSON
                            $data = json_decode($json_tamanhos, true);

                            // Verificar se a decodificação foi bem-sucedida
                            if ($data === null) {
                                die('Erro ao decodificar o JSON.');
                            }

                            // Gerar o bloco HTML apenas para números com quantidade maior que 0
                            foreach ($data as $numero => $quantidade) {
                                if ($quantidade > 0) {
                                    echo '<label class="radio">';
                                    echo '<input type="radio" name="size" value="' . $numero . '">';
                                    echo '<span>' . $numero . '</span>';
                                    echo '</label>';
                                    echo "\n"; // Adiciona uma quebra de linha para melhorar a legibilidade
                                }
                            }
                            ?>
                        </div>

                    </div>

                    <!-- Fim Escolha de tamanho do Tênis -->

                    <!-- Botão Comprar -->

                    <div class="row">
                        <div class="comprar-button d-flex justify-content-center mb-4 mt-4">
                            <input type="hidden" id="id_prod" value="<?php echo($tbl["id_produto"]); ?>">
                            <input type="button" class="btn btn-warning comprar" id="btn_cadastro" value="Adicionar">
                        </div>
                    </div>

                    <!-- Fim Botão Comprar -->
                </div>
            </div>
            <!-- Fim Coluna Descrição Do Produto-->

        </div>

        <!-- Fim Coluna Descrição do Produto -->

        <div class="row">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    MAIS OPÇÕES
                </div>
                </p>
            </div>

        </div>

        <div class="row justify-content-around mb-4">

            <!--NOVIDADES PHP -->
            <?php
            $sql_news = "SELECT a.*, b.local_img, b.nome_produto FROM tb_item_estoque AS a 
            INNER JOIN tb_produto AS b 
            ON a.id_produto = b.id_produto 
            WHERE a.disponivel = 1 ORDER BY a.dt_hr_entrada DESC LIMIT 3";

            $res_news = mysqli_query($conn, $sql_news);
            if ($res_news->num_rows > 0) {
                $num_prod = 0;

                while ($tbl_produto = $res_news->fetch_assoc()) {
                    if ($num_prod == 0) {
                        echo '<div class="row justify-content-around mb-4">';
                    }
                    echo '<div class="col col-custom mb-3">
                <a href="./produto.php?id_prod=' . $tbl_produto['id_produto'] . '">
       <div class="card custom-card">
            <img class="card-img-top" src="' . $tbl_produto['local_img'] . '" alt="Imagem de capa do card">
           <div class="card-body">
               <h5 style="font-size: 16px;" class="card-title text-center">' . $tbl_produto['nome_produto'] . '</h5>
               <p class="card-text text-center">' . $tbl_produto['valor_venda'] . '</p>
           </div>
       </div>
       </a>
   </div>';
                    $num_prod += 1;

                    if ($num_prod == 3) {
                        echo '</div>';
                        $num_prod = 0;
                    }
                }
            }
            ?>


        </div>

    </div>

</div>




<?php

include("../header_footer/footer.php");

?>