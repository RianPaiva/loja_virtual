<?php
session_start();

// include('../php/protect.php');
include("../header_footer/header.php");

?>

<link rel="stylesheet" href="../css/style_cadastro_produto.css">

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

        <div class="col-md-2 mt-4">
            <label for="produto" class="form-label"> Nome do Produto </label>
            <input type="text" class="form-control form-border" oninput="handleInput(event)" id="produto">
            <div id="listaProduto" class="list-group dropdown"></div>
        </div>

        <div class="col-md-7 hstack gap-3 ms-3 mb-1">
            
            <input type="hidden" id="id_produto">
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
                <a href="./relatorios/rel_produtos.php">
                <input type="submit" class="btn btn-info" id="btn_relatorio" value="Relatório">
                </a>
            </div>

        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <form id="form_produto">
        <!-- Formulário De Cadastro Do Fornecedor -->
        <div class="container-fluid pt-4 pb-5 bg-custom">

            <form class="row justify-content-center">

                <div class="row justify-content-center">

                    <div class="col-md-3 ">
                        <label for="nome_produto" class="form-label"> Nome Do Produto</label>
                        <input type="text" class="form-control" id="nome_produto" oninput="handleInput(event)" nome="nome_produto">
                    </div>

                    <div class="col-md-3">
                        <label for="fornecedor" class="form-label"> Fornecedor </label>
                        <input type="text" class="form-control" id="fornecedor"  oninput="handleInput(event)" placeholder="" name="fornecedor">
                        <div id="listaFornecedor" class="list-group dropdown"></div>
                        <input type="hidden" id="id_fornecedor">
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-3">
                        <label for="categoria" class="form-label"> Categoria </label>
                        <select name="tipo" id="categoria" class="form-select" required>
                            <option selected></option>
                            <?php
                                $sql_categoria="SELECT * FROM tb_categoria WHERE status = 1";
                                $result_categoria = mysqli_query($conn, $sql_categoria);
                                if($result_categoria->num_rows > 0){
                                    while($tbl_categoria = $result_categoria->fetch_assoc()){
                                        echo "<option value='".$tbl_categoria['id_categoria']."'>".$tbl_categoria["categoria"]."</option>";
                                    }
                                }else{

                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="genero" class="form-label"> Gênero </label>
                        <select class="form-select" id="genero" name="genero">
                            <option selected></option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="U">Unissex</option>
                        </select>
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <label for="imagem" class="form-label"> Escolha Uma Imagem </label>
                        <input class="form-control" type="file" id="imagem" name="imagem">
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
    </form>
    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 0px solid transparent">
    </div>

</div>

<script src="../js/cadastro_produto.js"></script>
<script src="../js/masks.js"></script>

<?php

include("../header_footer/footer.php");

?>