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
                    <label for="dt_adicao" class="form-label"> Data de Adição </label>
                    <input type="datetime-local" name="data adição" id="dt_adicao" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="disponivel" class="form-label"> Disponível </label>
                    <select name="disponivel" id="disponivel" class="form-select" required>
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
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