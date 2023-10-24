<?php

include("../pages/header.php");

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

        <div class="col-md-2">
            <label for="produto" class="form-label"> Nome do Produto </label>
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

    <form id="form_produto">
        <!-- Formulário De Cadastro Do Fornecedor -->
        <div class="container-fluid pt-4 pb-5 bg-custom">

            <form class="row justify-content-center">

                <div class="row justify-content-center">

                    <div class="col-md-3 ">
                        <label for="nome_produto" class="form-label"> Nome Do Produto</label>
                        <input type="text" class="form-control" id="nome_produto" nome="nome_produto">
                    </div>

                    <div class="col-md-3">
                        <label for="descricao" class="form-label"> Descrição </label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-3">
                        <label for="fornecedor" class="form-label"> Fornecedor </label>
                        <input type="text" class="form-control" id="fornecedor" placeholder="" name="id_fornecedor">
                        <div id="listaRazao"></div>
                        <input type="hidden" id="id_fornecedor">
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label"> Categoria </label>
                        <input type="text" class="form-control" id="categoria" name="categoria">
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-3">
                        <label for="genero" class="form-label"> Gênero </label>
                        <select class="form-select" id="id_genero" name="id_genero">
                            <option selected></option>
                            <?php
                            $query_genero = "SELECT * FROM tb_genero;";
                            $result_genero = mysqli_query($conn, $query_genero);
                            if ($result_genero->num_rows > 0) {
                                while ($tbl_genero = $result_genero->fetch_assoc()) {
                                    echo "<option value='" . $tbl_genero["id_genero"] . "'>" . $tbl_genero["genero"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="imagem" class="form-label"> Escolha Uma Imagem </label>
                        <input class="form-control" type="file" id="imagem" name="imagem">
                    </div>

                </div>

            </form>
        </div>
    </form>
    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

    <div class="row">
        <hr class="opacity-0" style="border: 21px solid transparent">
    </div>

</div>

<script src="../js/cadastro_produto.js"></script>

<?php

include("../pages/footer.php");

?>