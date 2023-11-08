<?php
include("../header_footer/header.php");


?>

<link rel="stylesheet" href="../css/style_produto.css">
<script src="../js/produto.js"></script>

<div class="clearfix"></div>

<div class="container-fluid" style="border: 1px solid blue; width: 100%;">

    <div class="container align-items-center">

        <div class="row justify-content-center">

            <!-- Coluna Imagem do Produto -->

            <div class="col-xxl-8">

                <div class="card card-produto ms-5 me-5 mt-5 pt-5">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="images p-5">
                                <div class="row">
                                    <div class="col col-custom">
                                        <img class="img-responsive" id="main-image" src="../imagens/tenis1.png" width="260" height="250">
                                    </div>
                                </div>
                                <div class="row mt-8">
                                    <div class="col col-custom thumbnail mt-5">
                                        <img class="line-check radio" onclick="change_image(this)" src="../imagens/tenis1.png" height="80" width="80">
                                    </div>
                                    <div class="col col-custom thumbnail mt-5">

                                        <img class="line-check radio" onclick="change_image(this)" src="../imagens/tenis2.png" height="80" width="80">
                                    </div>
                                    <div class="col col-custom thumbnail mt-5">
                                        <img class="line-check radio" onclick="change_image(this)" src="../imagens/tenis3.png" height="80" width="80">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Fim Coluna Imagem do Produto -->

            <!-- Coluna Descrição do Produto -->

            <div class="col-sm-4 mt-5 mb-5">

                <!-- Descrição do Produto -->

                <div class="col mt-5" style="border: 1px solid black; border-radius: 5px;">

                    <div class="row ms-2 mt-5 nome-produto">
                        <p> Tênis Dunk Low </p>
                    </div>
                    <div class="row ms-2 mt-1 valor-produto">
                        <p>R$ 1.200,00</p>
                    </div>

                    <!-- Fim Descrição do Produto -->

                    <!-- Escolha de tamanho do Tênis -->

                    <div class="row ms-2 mt-2">
                        <p class="tamanho">Escolha o tamanho:</p>
                    </div>

                    <div class="row ms-2 d-flex flex-row">

                        <div class="sizes mt-1 mb-3">
                            <label class="radio">
                                <input type="radio" name="size" value="36">
                                <span>36</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="37">
                                <span>37</span>
                            </label>

                            <label class="radio"> <input type="radio" name="size" value="38">
                                <span>38</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="39">
                                <span>39</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="40">
                                <span>40</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="41">
                                <span>41</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="42">
                                <span>42</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="43">
                                <span>43</span>
                            </label>

                            <label class="radio">
                                <input type="radio" name="size" value="44">
                                <span>44</span>
                            </label>

                        </div>

                    </div>

                    <!-- Fim Escolha de tamanho do Tênis -->

                    <!-- Calcular Frete -->

                    <div class="row-sm-1">

                        <div class="form-group ms-3 me-1 col-md-5">
                            <label for="inputCEP"> Calcular Frete: </label>
                            <input type="text" class="form-control" id="inputCEP" placeholder="CEP">
                        </div>

                    </div>

                    <!-- Fim Calcular Frete -->

                    <!-- Botão Comprar -->

                    <div class="row">
                        <div class="comprar-button d-flex justify-content-center mb-4 mt-4">
                            <input type="submit" class="btn btn-warning comprar" id="btn_comprar" value="Comprar">
                        </div>
                    </div>

                    <!-- Fim Botão Comprar -->
                </div>
            </div>
            <!-- Fim Coluna Descrição Do Produto-->

        </div>

        <!-- Fim Coluna Descrição do Produto -->

        <div class="row">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    MAIS OPÇÕES
                </div>
                </p>
            </div>

        </div>

        <div class="row justify-content-around mb-4">

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-wmns-nike-dunk-low-se-just-do-it-white.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> WMNS Nike Dunk Low </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-nike-dunk-low-retro-cargo-khaki-mystic-red.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Nike Dunk Low Retro </h5>
                        <p class="card-text text-center">R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-jordan-luka-2-bred.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Jordan Luka 2 </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php

include("../header_footer/footer.php");

?>