<?php
include("../header_footer/header.php");
?>

<link href="../css/style_carrinho.css" rel="stylesheet">


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                Endereço de Entrega
            </div>
            </p>
        </div>
    </div>


    <div class="row text-center justify-content-around">

        <div class="col-md-7" style="border:1px solid black">
            <h2> Endereços Salvos </h2>

            <div class="row mt-5">
                <div class="col-md-6">
                    <label for="acesso" class="form-label"> Selecionar Endereço </label>
                    <select class="form-select" id="acesso">
                        <option></option>
                        <option value="1"> Rua 1 </option>
                        <option value="2"> Rua 2 </option>
                        <option value="3"> Rua 3 </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="acesso" class="form-label"> Selecionar Frete </label>
                    <select class="form-select" id="acesso">
                        <option></option>
                        <option value="1"> Rua 1 </option>
                        <option value="2"> Rua 2 </option>
                        <option value="3"> Rua 3 </option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-5" style="border:1px solid black">
                    <h2> Cadastrar Novo Endereço </h2>
                </div>

                <div class="row">
                    <form class="row justify-content-center">

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label for="rua" class="form-label">Rua</label>
                                <input type="text" class="form-control" id="rua">
                            </div>

                            <div class="col-md-6">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro">
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" placeholder="">
                            </div>

                            <div class="col-md-6">
                                <label for="numero" class="form-label">Numero</label>
                                <input type="text" class="form-control" id="numero" placeholder="">
                            </div>
                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="complemento" placeholder="">
                            </div>

                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" placeholder="">
                            </div>
                        </div>

                </div>
            </div>
        </div>

        
    <div class="col-md-3" style="border:1px solid black">
        <h1> kkkk </h1>
    </div>

    </div>







</div>


</div>


</html>



<?php

include("../header_footer/footer.php");

?>