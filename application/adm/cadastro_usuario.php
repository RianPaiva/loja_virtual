<?php

session_start();

// include('../php/protect.php');
include("../header_footer/header.php");

?>

<link rel="stylesheet" href="../css/style_cadastro_usuario.css">

<div class="container-fluid mt-5">

    <!-- Título Cadastro de Fornecedor -->

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                CADASTRO DE USUÁRIO
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2">
            <label for="pesquisa_nome" class="form-label">Nome</label>
            <input type="text" class="form-control form-border" oninput="handleInput(event)" id="pesquisa_nome">
            <div id="listaUsuario" class="list-group dropdown"></div>
        </div>

        <div class="col-md-2">
            <label for="pesquisa_nome" class="form-label">Email</label>
            <input type="text" class="form-control form-border" oninput="lowerInput(event)" id="pesquisa_email">
        </div>

        <div class="col-md-7 hstack gap-3 ms-3 mb-4">
            <input type="hidden" id="id_usuario">
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary" id="btn_pesquisar" value="Pesquisar">
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-danger" id="btn_limpar" value="Limpar">
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-success" id="btn_cadastrar" value="Cadastrar">
            </div>
            <div class="col-md-2">
                <a href="./relatorios/rel_usuarios.php">
                    <input type="submit" class="btn btn-info" id="btn_relatorio" value="Relatório">
                </a>
            </div>

        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">


    <!-- Formulário De Cadastro Do Fornecedor -->
    <div class="container-fluid pt-4 pb-5 bg-custom">

        <form class="row justify-content-center">

            <div class="row justify-content-center">

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" oninput="lowerInput(event)" id="email" placeholder="">
                </div>

                <!-- <div class="col-md-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="">
                </div> -->

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" oninput="handleInput(event)" id="nome">
                </div>


                <div class="col-md-3">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" maxlength="18" class="form-control" oninput="handleInput(event)" id="sobrenome">
                </div>
            </div>

            <!-- <div class="row justify-content-center">

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="">
                </div>

                <div class="col-md-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="">
                </div>

            </div> -->

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status">
                        <option></option>
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="acesso" class="form-label">Nível de Acesso</label>
                    <select class="form-select" id="acesso">
                        <option></option>
                        <option value="1">Acesso Total</option>
                        <option value="2">Somente Relatórios</option>
                    </select>
                </div>

            </div>

    </div>

    </form>

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 40px solid transparent">
    </div>


</div>

<!-- Faixa Dourada -->


<script src="../js/cadastro_usuario.js"></script>
<script src="../js/autocomplete_usuario.js"></script>
<script src="../js/masks.js"></script>

<?php
// include("../php/autocomplete_usuario.php");
include("../header_footer/footer.php");

?>