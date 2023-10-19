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
            <label for="inputRazaoSocial" class="form-label">Razão Social</label>
            <input type="text" class="form-control form-border" id="inputRazaoSocial">
        </div>

        <div class="col-md-2">
            <label for="inputCnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control form-border" id="inputCnpj">
        </div>

        <div class="col-md-6 hstack gap-3 ms-5">

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
                    <label for="inputRazaoSocial" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="inputRazaoSocial">
                </div>

                <div class="col-md-3">
                    <label for="inputCnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="inputCnpj">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="inputEmail" placeholder="">
                </div>

                <div class="col-md-3">
                    <label for="inputTelefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="inputTelefone" placeholder="(xx) xxxxx-xxxx">
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <label for="inputPais" class="form-label">País</label>
                    <select class="form-select" id="inputPais" name="País">
                        <option selected> Selecione </option>
                        <option value="AR">Argentina</option>
                        <option value="BR">Brazil</option>
                        <option value="CL">Chile</option>
                        <option value="CO">Colombia</option>
                        <option value="UY">Uruguay</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="inputState" class="form-label">Estado</label>
                    <select id="inputState" class="form-select">
                        <option selected> Selecione </option>
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
                    <label for="inputCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="inputCidade">
                </div>

                <div class="col-md-3">
                    <label for="inputLogradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" id="inputLogradouro">
                </div>

            </div>

            <div class="row d-flex justify-content-center">

                <div class="col-md-3">
                    <label for="inputComplemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="inputComplemento">
                </div>

                <div class="col-md-3">
                    <div class="col-md-6 justify-content-start">
                        <label for="inputNumEndereco" class="form-label ">Número do Endereço</label>
                        <input type="number" class="form-control " id="inputNumEndereco">
                    </div>
                </div>

            </div>
           
        </form>
    </div>

    <!-- Faixa Dourada -->

    <hr class="hr-gold mt-4 mb-4">

</div>


<?php

include("../pages/footer.php");

?>