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
                    <input type="submit" class="cadastro" id="btn_cad_fornecedor" value="Fornecedores">
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <input type="submit" class="cadastro" id="btn_cad_produto" value="Produto">
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-center mb-4 mt-4">
                    <input type="submit" class="cadastro" id="btn_cad_estoque" value="Estoque">
                </div>
            </div>

        </div>

        <div class="col-md-5">
            <div id="div_vendas"></div>
        </div>

        <div class="col-md-5">
            <div id="div_vendas_mes"></div>
        </div>

    </div>

</div>

<?php

include("../header_footer/footer.php");

?>