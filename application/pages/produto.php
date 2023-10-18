<?php
include("header.php");
?>

<link rel="stylesheet" href="../css/style_produto.css">

<div class="clearfix"></div>

<div class="container-fluid">

    <div class="container vh-90 align-items-center" style="margin-top:40px; border: 3px solid brown">

        <div class="row justify-content-center" style="border:1px solid blue;">


            <!-- Coluna Imagem do Produto -->

            <div class="col-xxl-8" style="border:1px solid blue;">

                <div class="row justify-content-center">

                    <div class="d-flex justify-content-center">
                        <img class="img-fluid" src="..\imagens\dunk-verde.png" width="800" height="500" alt="Produto">
                    </div>

                    <div class="row justify-content-sm-center" style="border:1px solid blue;">

                        <div class="col-2 p-3">
                            <input type="radio" class="btn-check" name="options" id="option1-1" autocomplete="off">
                            <label class="btn btn-light" for="option1-1"> <img class="img-fluid img-prod" src="..\imagens\dunk-preto-branco.png" alt="" width="60" height="60"> </label>
                        </div>

                        <div class="col-2 p-3">
                            <input type="radio" class="btn-check" name="options" id="option2-1" autocomplete="off">
                            <label class="btn btn-light" for="option2-1"> <img class="img-fluid img-prod" src="..\imagens\airforce-teste.png" alt="" width="60" height="60"> </label>
                        </div>

                        <div class="col-2 p-3">
                            <input type="radio" class="btn-check" name="options" id="option3-1" autocomplete="off">
                            <label class="btn btn-light" for="option3-1"> <img class="img-fluid img-prod" src="..\imagens\adidas-superstar.png" alt="" width="60" height="60"> </label>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Fim Coluna Imagem do Produto -->

            <!-- Coluna Descrição do Produto -->

            <div class="col-sm-4 mt-5" style="border:1px solid black; border-radius: 10px; max-height: 500px;">

                <!-- Descrição do Produto -->

                <div class="row ms-2 mt-5 nome-produto">
                    <p> Tênis Dunk Low Verde </p>
                </div>
                <div class="row ms-2 mt-1 valor-produto">
                    <p>R$ 1.000,00</p>
                </div>

                <!-- Fim Descrição do Produto -->

                <!-- Escolha de tamanho do Tênis -->

                <div class="row ms-2 mt-2">
                    <p class="tamanho">Escolha o tamanho:</p>
                </div>

                <div class="row ms-2 d-flex flex-row">

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn btn-secondary" for="option1">36</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn btn-secondary" for="option2">37</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                        <label class="btn btn-secondary" for="option3">38</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                        <label class="btn btn-secondary" for="option4">39</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option5" autocomplete="off">
                        <label class="btn btn-secondary" for="option5">40</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option6" autocomplete="off">
                        <label class="btn btn-secondary" for="option6">41</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option7" autocomplete="off">
                        <label class="btn btn-secondary" for="option7">42</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option8" autocomplete="off">
                        <label class="btn btn-secondary" for="option8">43</label>
                    </div>

                    <div class="col-1 p-3">
                        <input type="radio" class="btn-check" name="options" id="option9" autocomplete="off">
                        <label class="btn btn-secondary" for="option9">44</label>
                    </div>
                </div>

                <!-- Fim Escolha de tamanho do Tênis -->

                <!-- Calcular Frete -->

                <div class="row">

                    <div class="form-group ms-3 col-md-5">
                        <label for="inputCEP">Calcular Frete:</label>
                        <input type="text" class="form-control" id="inputCEP" placeholder="CEP">
                    </div>

                </div>

                <div class="row">
                    <div class="comprar-button d-flex justify-content-center">
                        <input type="submit" class="btn btn-warning comprar" id="btn_login" value="Comprar">
                    </div>
                </div>

                <!-- Fim Calcular Frete -->

            </div>
            <!-- Fim Coluna Descrição Do Produto-->

        </div>

        <div class="row">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500" >
                    MAIS OPÇÕES
                </div>
                </p>
            </div>

        </div>

        <div class="row justify-content-around" style="border:1px solid blue;">

            <div class="col col-custom" style="border:1px solid blue;">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\pumasemfundo.png " alt="Imagem de capa do card" width="300" height="300">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Puma </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom" style="border:1px solid blue;">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\dior.png" alt="Imagem de capa do card" width="300" height="300">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Dior </h5>
                        <p class="card-text text-center">R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom" style="border:1px solid blue;">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\jordan4.png" alt="Imagem de capa do card" width="300" height="300">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Cactus </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>