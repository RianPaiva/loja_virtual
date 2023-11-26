<?php

session_start();
// include('../php/protect.php');
include("../header_footer/header.php");

?>

<link rel="stylesheet" href="../css/style_cadastro_fornecedor.css">

<div class="container-fluid mt-5">

    <!-- Título Cadastro de Fornecedor -->

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                CADASTRO DE FORNECEDOR
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2 mt-4">
            <label for="pesquisa_razao"  class="form-label">Razão Social</label>
            <input type="text" class="form-control form-border" oninput="handleInput(event)" id="pesquisa_razao">
            <div id="listaRazao"></div>
        </div>

        <div class="col-md-2 mt-4">
            <label for="pesquisa_cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control form-border" onkeyup="mascara_cpf_cnpj(event)" maxlength="18" id="pesquisa_cnpj">
        </div>

        <div class="col-md-7 hstack gap-3 ms-3 ms-3 mb-1">
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
                <a href="./relatorios/rel_fornecedores.php">
                <input type="submit" class="btn btn-info" id="btn_relatorio" value="  Relatório  ">
                </a>
            </div>

        </div>

    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">


    <!-- Formulário De Cadastro Do Fornecedor -->
    <div class="container-fluid pt-4 pb-5 bg-custom">

        <form class="row justify-content-center">

            <div class="row justify-content-center mb-0">

                <div class="col-md-3 mb-0">
                    <label for="razao_social" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" oninput="handleInput(event)" id="razao_social">
                </div>


                <div class="col-md-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" oninput="mascara_cpf_cnpj(event)" maxlength="18" class="form-control" id="cnpj">
                </div>
            </div>



            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" oninput="lowerInput(event)" id="email" placeholder="">
                </div>

                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" onkeyup="handlePhone(event)" maxlength="15" id="telefone" placeholder="(xx) xxxxx-xxxx">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="pais" class="form-label">País</label>
                    <select class="form-select" id="pais" name="País">
                        <option value=""></option>
                        <?php
                        $query_pais = "SELECT * FROM tb_pais;";
                        $result_pais = mysqli_query($conn, $query_pais);
                        if ($result_pais->num_rows > 0) {
                            while ($tbl_pais = $result_pais->fetch_assoc()) {
                                echo "<option value = '" . $tbl_pais["id_pais"] . "'>" . $tbl_pais["nome_pt"] . "<option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" class="form-select">
                        <option selected> </option>
                        <?php
                        $sql_estado = "SELECT * FROM tb_estado_br;";
                        $res_estado = mysqli_query($conn, $sql_estado);
                        if ($res_estado->num_rows > 0) {
                            while ($tbl_estado = $res_estado->fetch_assoc()) {
                                echo "<option value='" . $tbl_estado["id_estado"] . "'>" . $tbl_estado["nome"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" oninput="handleInput(event)" class="form-control" id="cidade">
                </div>

                <div class="col-md-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" oninput="handleInput(event)" class="form-control" id="logradouro">
                </div>

            </div>

            <div class="row d-flex justify-content-center">

                <div class="col-md-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" oninput="handleInput(event)" class="form-control" id="complemento">
                </div>

                <div class="col-md-1">
                    <label for="numero" class="form-label ">Número</label>
                    <input type="number" class="form-control " id="numero">
                </div>


                <div class="col-md-2">
                    <label for="status" class="form-label ">Status</label>
                    <select class="form-control" id="status">
                        <option></option>
                        <option value="1">ATIVO</option>
                        <option value="0">INATIVO</option>
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





<!-- IMPORTAÇÃO JS -->

<script src="../js/cadastro_fornecedor.js"></script>
<script src="../js/autocomplete_fornecedor.js"></script>
<script src="../js/masks.js"></script>
<?php

include("../header_footer/footer.php");

?>