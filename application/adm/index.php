<?php

include("../header_footer/header.php");

?>

<head>

    <link rel="stylesheet" href="../css/style_area_adm.css">
    <script src="../js/grafico.js"></script>

</head>

<div class="container-fluid mt-5">

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                ÁREA DO ADMINISTRADOR
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <a href="cadastro_fornecedor.php">
                        <input type="button" class="cadastro" id="btn_cad_fornecedor" value="Fornecedores">
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <a href="cadastro_produto.php">
                        <input type="button" class="cadastro" id="btn_cad_produto" value="Produto">
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <a href="produto_estoque.php">
                        <input type="button" class="cadastro" id="btn_cad_estoque" value="Estoque">
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <a href="cadastro_usuario.php">
                        <input type="button" class="cadastro" id="btn_cad_usuario" value="Usuário">
                    </a>
                </div>
            </div>

        </div>

        <div class="row mt-5">

            <div class="col-md-6">
                <div id="div_vendas"></div>
            </div>

            <div class="col-md-6">
                <div id="div_vendas_mes"></div>
            </div>

        </div>

        <div class="row mt-5">

            <div class="col-md-6">
                <div id="div_taxa_conversao"></div>
            </div>

            <div class="col-md-6">
                <div id="div_vendas_ano"></div>
            </div>

        </div>

    </div>

</div>

<?php

include("../header_footer/footer.php");

?>