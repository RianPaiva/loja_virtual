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
                CADASTRO DE FORNECEDOR
            </div>
            </p>
        </div>
    </div>

    <div class="row justify-content-start ">

        <div class="col-md-2">
            <label for="pesquisa_razao" class="form-label">Razão Social</label>
            <input type="text" class="form-control form-border" id="pesquisa_razao">
            <div id="listaRazao"></div>
        </div>

        <div class="col-md-2">
            <label for="pesquisa_cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control form-border" id="pesquisa_cnpj">
        </div>

        <div class="col-md-6 hstack gap-3 ms-5">
            <input type="hidden" id="id_fornecedor" value="">
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
                    <label for="razao_social" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="razao_social">
                </div>


                <div class="col-md-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj">
                </div>
            </div>



            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="">
                </div>

                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" placeholder="(xx) xxxxx-xxxx">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="pais" class="form-label">País</label>
                    <select class="form-select" id="pais" name="País">
                        <option value = ""></option>
                        <option value="AR">Argentina</option>
                        <option value="BR">Brazil</option>
                        <option value="CL">Chile</option>
                        <option value="CO">Colombia</option>
                        <option value="UY">Uruguay</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" class="form-select">
                        <option selected> </option>
                        <option> AC </option>
                        <option> AL </option>
                        <option> AP </option>
                        <option> AM </option>
                        <option> BA </option>
                        <option> CE </option>
                        <option> ES </option>
                        <option> GO </option>
                        <option> MA </option>
                        <option> MT </option>
                        <option> MS </option>
                        <option> MG </option>
                        <option> PA </option>
                        <option> PB </option>
                        <option> PR </option>
                        <option> PE </option>
                        <option> PI </option>
                        <option> RJ </option>
                        <option> RN </option>
                        <option> RS </option>
                        <option> RO </option>
                        <option> RR </option>
                        <option> SC </option>
                        <option> SP </option>
                        <option> SE </option>
                        <option> TO </option>
                        <option> DF </option>
                    </select>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade">
                </div>

                <div class="col-md-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro">
                </div>

            </div>

            <div class="row d-flex justify-content-center">

                <div class="col-md-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="complemento">
                </div>

                <div class="col-md-3">
                    <div class="col-md-6 justify-content-start">
                        <label for="numero" class="form-label ">Número do Endereço</label>
                        <input type="number" class="form-control " id="numero">
                    </div>
                </div>

            </div>

        </form>
    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

</div>


<!-- IMPORTAÇÃO JS -->

<script src="../js/cadastro_fornecedor.js"></script>
<script src="../js/busca_fornecedor.js"></script>
<?php

include("../pages/footer.php");

?>