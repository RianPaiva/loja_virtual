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
                <div class="col-lg-12">

                    <div class="card text-start">
                        <div class="card-body">

                            <div class="row mx-auto">
                                <label class="radio">
                                    <input type="radio" name="endereco">
                                    <div class="col-md-12">


                                        <div class="row text-start">
                                            <h4>Rua 1</H4>
                                        </div>

                                        <div class="row text-start">
                                            <div class="col-md-3">
                                                <H6>CEP : 12345-678</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <H6> Numero: 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-lg-12">

                    <div class="card text-start">
                        <div class="card-body">
                            <div class="row mx-auto">
                                <label class="radio">
                                    <input type="radio" name="endereco">
                                    <div class="col-md-12">
                                        <div class="row text-start">
                                            <h4>Rua 2</H4>
                                        </div>
                                        <div class="row text-start">
                                            <div class="col-md-3">
                                                <H6>CEP : 12345-678</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <H6> Numero: 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-lg-12">

                    <div class="card text-start">
                        <div class="card-body">
                            <div class="row mx-auto">
                                <label class="radio">
                                    <input type="radio" name="endereco">
                                    <div class="col-md-12">
                                        <div class="row text-start">
                                            <h4>Rua 3</H4>
                                        </div>
                                        <div class="row text-start">
                                            <div class="col-md-3">
                                                <H6>CEP : 12345-678</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <H6> Numero: 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3 text-start">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-auto">
                                <label class="radio">
                                    <input type="radio" name="endereco">
                                    <div class="col-md-12">
                                        <div class="row text-start">
                                            <h4>Rua 4</H4>
                                        </div>
                                        <div class="row text-start">
                                            <div class="col-md-3">
                                                <H6>CEP : 12345-678</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <H6> Numero: 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botão para acionar modal -->
                <div class="d-grid gap-2 d-md-block">
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#enderecos">
                        Meus Endereços Salvos
                    </button>
                </div>

                <div id="enderecos" class="modal">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="enderecos">Endereços</h3>
                                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                            </div>

                        </div>

                        <div class="modal-body">
                            <p> blabla </p>
                            <p> blabla </p>
                            <p> blabla </p>
                            <p> blabla </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </div>

                </div>




            </div>




            <div class="row">
                <div class="col-lg-12 mt-4" style="border:1px solid black">
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


        <aside class="col-md-3 text-center" style="border:1px solid black">
            <div class="box rounded">
                <header class="text-center">Resumo da compra</header>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..\imagens\tenis-nike-dunk-low-retro-cargo-khaki-mystic-red.png"
                        alt="Imagem de capa do card">
                    <div class="card-body">
                        <h3 class="card-title"> Airforce X </h3>
                        <p class="card-text">Quantidade: 1</p>
                    </div>
                </div>


                <div class="info">
                    <div><span>Sub-total</span><span>R$418,00</span></div>
                    <div><span>Frete</span><span>R$0,00</span></div>

                </div>

                <footer class="rounded bg-color">
                    <span>Total</span>
                    <span>R$ 418</span>
                </footer>
            </div>
            <button class="rounded">Confirmar Compra</button>
        </aside>

    </div>







</div>


</div>


</html>



<?php

include("../header_footer/footer.php");

?>