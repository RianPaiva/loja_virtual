<?php

include("header.php");

?>

<link rel="stylesheet" href="../css/style_perfil_cliente.css">

<div class="container-fluid mt-5">

    <!-- Título Cadastro de Fornecedor -->

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                PERFIL
            </div>
            </p>
        </div>
    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">


    <!-- Formulário De Cadastro Do Fornecedor -->
    <div class="container-fluid pt-4 pb-5 bg-custom">

        <form class="row justify-content-center">

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="nome" class="form-label"> Nome </label>
                    <input type="text" class="form-control" id="nome">
                </div>

                <div class="col-md-3">
                    <label for="sobrenome" class="form-label"> Sobrenome </label>
                    <input type="text" class="form-control" id="sobrenome">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="email" class="form-label"> Email </label>
                    <input type="email" class="form-control" id="email">
                </div>

                <div class="col-md-3">
                    <label for="cpf" class="form-label"> CPF </label>
                    <input type="text" class="form-control" id="cpf">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="genero" class="form-label"> Gênero </label>
                    <select class="form-select" id="genero" name="Gênero">
                        <option selected> Selecione </option>
                        <option value="M"> Masculino </option>
                        <option value="F"> Feminino </option>
                        <option value="O"> Outros </option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="dt_nascimento" class="form-label"> Data de Nascimento </label>
                    <input class="form-control" type="date" id="dt_nascimento">
                </div>

            </div>

        </form>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-3 justify-content-center">
                    <div class="text-center">
                        <input type="submit" class="btn btn-gold" id="btn_pesquisar" value="Salvar">
                    </div>
                </div>

                <div class="col-md-3 justify-content-center">
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" id="btn_cadastrar" value="Editar">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 21px solid transparent">
    </div>

</div>

<?php

include("footer.php");

?>