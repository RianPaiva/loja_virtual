<?php

include("../pages/header.php");

?>

<link rel="stylesheet" href="../css/style_cadastro_fornecedor.css">

<div class="container-fluid mt-5">

    <!-- Título Cadastro de Fornecedor -->

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                CADASTRO DE PRODUTO
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2">
            <label for="nome_produto" class="form-label"> Nome do Produto </label>
            <input type="text" class="form-control form-border" id="nome_produto">
        </div>

        <div class="col-md-6 hstack gap-3 ">

            <input type="submit" class="btn btn-primary" id="btn_pesquisar" value="Pesquisar">
            <input type="submit" class="btn btn-danger" id="btn_limpar" value="Limpar">
            <input type="submit" class="btn btn-success" id="btn_cadastrar" value="Cadastrar">

        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">


    <!-- Formulário De Cadastro Do Fornecedor -->
    <div class="container-fluid pt-4 pb-5 bg-custom">

        <form class="row justify-content-center">

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="nome_produto" class="form-label"> Nome Do Produto</label>
                    <input type="text" class="form-control" id="nome_produto">
                </div>

                <div class="col-md-3">
                    <label for="descricao" class="form-label"> Descrição </label>
                    <input type="text" class="form-control" id="descricao">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="fornecedor" class="form-label"> Fornecedor </label>
                    <input type="text" class="form-control" id="fornecedor" placeholder="">
                </div>

                <div class="col-md-3">
                    <label for="categoria" class="form-label"> Categoria </label>
                    <input type="text" class="form-control" id="categoria">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="genero" class="form-label"> Gênero </label>
                    <select class="form-select" id="genero" name="Gênero">
                        <option selected> Selecione </option>
                        <option value="M"> Masculino </option>
                        <option value="F"> Feminino </option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="imagem" class="form-label"> Escolha Uma Imagem </label>
                    <input class="form-control" type="file" id="imagem">
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


<?php

include("../pages/footer.php");

?>