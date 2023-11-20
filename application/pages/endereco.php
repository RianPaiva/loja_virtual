<?php
include("../header_footer/header.php");
?>

<link href="../css/style_endereco.css" rel="stylesheet">


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

        <div class="col-md-7 mt-4">
            <h2> Endereços Salvos </h2>

            <div class="row row-custom overflow-y-scroll">

                <div class="row mt-4">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-3">

                                    <label class="">
                                        <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                            <input type="radio" name="endereco">
                                        </div>

                                        <div class="col-md-10 ms-5">

                                            <div class="row text-start">
                                                <h4>Rua 1*******</H4>
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

                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-3">

                                    <label class="">
                                        <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                            <input type="radio" name="endereco">
                                        </div>

                                        <div class="col-md-10 ms-5">

                                            <div class="row text-start">
                                                <h4>Rua 2*******</H4>
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

                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-3">

                                    <label class="">
                                        <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                            <input type="radio" name="endereco">
                                        </div>

                                        <div class="col-md-10 ms-5">

                                            <div class="row text-start">
                                                <h4>Rua 3*******</H4>
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

                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-3">

                                    <label class="">
                                        <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                            <input type="radio" name="endereco">
                                        </div>

                                        <div class="col-md-10 ms-5">

                                            <div class="row text-start">
                                                <h4>Rua 4*******</H4>
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


            </div>

            <div class="row mt-4 mb-2 text-center justify-content-around">

                <div class="col-md-4">
                    <p class="">
                        <a class="btn btn-warning avancar" data-bs-toggle="collapse" href="#multiCollapseExample1"
                            role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Novo Endereço</a>
                    </p>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-lg-12 mt-4">
                                        <h2> Cadastrar Novo Endereço </h2>
                                    </div>

                                    <div class="row">
                                        <form class="row ms-3 justify-content-center">

                                            <div class="row justify-content-center mt-3">
                                                <div class="col-md-6 text-start">
                                                    <label for="rua" class="form-label">Rua</label>
                                                    <input type="text" class="form-control" id="rua">
                                                </div>

                                                <div class="col-md-6 text-start">
                                                    <label for="bairro" class="form-label">Bairro</label>
                                                    <input type="text" class="form-control" id="bairro">
                                                </div>

                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6 text-start">
                                                    <label for="cidade" class="form-label">Cidade</label>
                                                    <input type="text" class="form-control" id="cidade" placeholder="">
                                                </div>

                                                <div class="col-md-6 text-start">
                                                    <label for="numero" class="form-label">Numero</label>
                                                    <input type="text" class="form-control" id="numero" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-md-6 text-start">
                                                    <label for="complemento" class="form-label">Complemento</label>
                                                    <input type="text" class="form-control" id="complemento"
                                                        placeholder="">
                                                </div>

                                                <div class="col-md-6 text-start">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" id="estado" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="comprar-button d-flex justify-content-center mb-4 mt-4">
                                                    <input type="submit" class="btn btn-warning cadastrar"
                                                        id="btn_comprar" value="Cadastrar">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <aside class="col-md-3 text-center">
            <div class="box rounded" style="border: 1px solid black">
                <header class="text-center">Resumo da compra</header>

                <div class="info">
                    <div><span>Sub-total</span><span>R$418,00</span></div>
                    <div><span>Frete</span><span>R$0,00</span></div>
                </div>

                <footer class="rounded bg-transparent" style="border: 1px solid black">
                    <span>Total</span>
                    <span>R$ 418</span>
                </footer>
            </div>

            <div class="row">
                <div class="comprar-button d-flex justify-content-center mb-4 mt-1">
                    <input type="submit" class="btn btn-warning avancar" id="btn_avancar" value="Avançar">
                </div>
            </div>
        </aside>

    </div>


    <div class="row">
        <hr class="opacity-0" style="border: 45px solid transparent">
    </div>




</div>


</div>


</html>



<?php

include("../header_footer/footer.php");

?>