<?php

include("../pages/header.php");

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
            <label for="produto" class="form-label"> Produto </label>
            <input type="text" class="form-control form-border" id="produto">
        </div>

        <div class="col-md-2">
            <label for="produto" class="form-label"> Codigo do Produto </label>
            <input type="text" class="form-control form-border" id="produto">
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

        <form id="form_produto" class="row justify-content-center">

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="tipo" class="form-label"> Tipo de Produto </label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="tenis">Tênis</option>
                        <option value="roupa">Roupa</option>
                    </select>
                </div>

                <div class="col-md-3 ">
                    <label for="modelo" class="form-label"> Produto </label>
                    <input type="text" name="modelo" id="modelo" class="form-control" required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="preco" class="form-label"> Preço </label>
                    <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
                </div>

                <div class="col-md-3">
                    <label for="dt_adicao" class="form-label"> Data de Adição </label>
                    <input type="date" name="data adição" id="dt_adicao" class="form-control" required>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="tamanhos_quantidades" class="form-label"> Tamanhos e Quantidades (JSON) </label>
                    <input type="text" name="tamanhos_quantidades" id="tamanhos_quantidades" class="form-control" placeholder="Exemplo: {'35': 10, '36': 20, '37': 15}" required>
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

                <div class="col-md-6 mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="3"></textarea>
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