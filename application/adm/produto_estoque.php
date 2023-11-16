<?php

include("../header_footer/header.php");

?>

<link rel="stylesheet" href="../css/style_produto_estoque.css">

<div class="container-fluid mt-5">

    <!-- Título Cadastro de Fornecedor -->

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                CADASTRO NO ESTOQUE
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2">
            <label for="pesq_prod_est" class="form-label"> Nome Do Produto </label>
            <input type="text" class="form-control form-border" id="pesq_pro_est">
        </div>

        <div class="col-md-2">
            <label for="cod_produto" class="form-label"> Código do Produto </label>
            <input type="text" class="form-control form-border" id="cod_produto">
        </div>

        <div class="col-md-6 hstack gap-3 ">

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
            <div class="col-md-2">
                <a href="./relatorios/rel_estoque.php">
                <input type="submit" class="btn btn-info" id="btn_relatorio" value="  Relatório  ">
                </a>
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
                    <label for="Produto" class="form-label"> Produto </label>
                    <input type="text" name="produto" id="produto" class="form-control" required>
                    <input type="hidden" id="id_produto" value="">
                    <div id="listaProduto"></div>
                </div>

                <div class="col-md-3">
                    <label for="preco" class="form-label"> Preço </label>
                    <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="dt_adicao" class="form-label"> Data de Adição </label>
                    <input type="date" name="data adição" id="dt_adicao" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="disponivel" class="form-label"> Disponível </label>
                    <select name="disponivel" id="disponivel" class="form-select" required>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-6">
                    <label for="tamanhos_quantidades" class="form-label"> Tamanhos e Quantidades (JSON) </label>
                    <input type="text" name="tamanhos_quantidades" id="tamanhos_quantidades" class="form-control" required>
                    <small class="form-text text-muted">Exemplo: {"35": 10, "36": 20, "37": 15}</small>
                </div>

            </div>

        </form>
    </div>
    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 21px solid transparent">
    </div>

</div>
<script src="../js/produto_estoque.js"></script>

<?php

include("../header_footer/footer.php");

?>