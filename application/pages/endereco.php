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

            <div class="row row-custom overflow-y-scroll" id="list_enderecos">

                <?php
                $sql_endereco = "SELECT a.*, b.nome, b.uf FROM tb_endereco AS a INNER JOIN tb_estado_br AS b ON a.estado = b.id_estado WHERE id_cliente = 1;";
                $res_endereco = mysqli_query($conn, $sql_endereco);
                if ($res_endereco->num_rows > 0) {
                    while($tbl_endereco = $res_endereco->fetch_assoc()){
                        echo '
                        
                        <div class="row mt-3">
                        <div class="col-lg-12">    
                            <div class="card">
                                <div class="card-body">    
                                    <div class="row mt-3">    
                                        <label class="">
                                            <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                                <input type="radio" id="sel_endereco" name="endereco" value="'.$tbl_endereco["id_endereco"].'">
                                            </div>    
                                            <div class="col-md-10 ms-5">    
                                                <div class="row text-start">
                                                    <h4>Rua: '.$tbl_endereco["rua"]. ', '.$tbl_endereco["numero"].' - '.$tbl_endereco["bairro"].', '.$tbl_endereco["cidade"].'- '.$tbl_endereco["uf"].'</h4>
                                                </div>    
                                                <div class="row text-start">
                                                    <div class="col-md-3">
                                                        <H6 id="'.$tbl_endereco["id_endereco"].'">CEP: '.$tbl_endereco["cep"].'</h6>
                                                    </div>
                                                    <div class="col-md-3 edit">
                                                        <i class="fa fa-edit" style="font-size:24px" onclick="editarEndereco('.$tbl_endereco["id_endereco"].')"></i> Editar
                                                    </div>
                                                </div>
                                            </div>
                                        </label>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        ';
                    }
                    
                } else {
                    echo "<h2>Nenhum endereço cadastrado</h2>";
                }

                ?>

                
            </div>

            <div class="row mt-4 mb-2 text-center justify-content-around">

                <div class="col-md-4">
                    <p class="">
                        <a class="btn btn-warning avancar" id="open_form" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Novo Endereço</a>
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
                                                    <input type="text" class="form-control" id="rua" oninput="handleInput(event)">
                                                </div>

                                                <div class="col-md-6 text-start">
                                                    <label for="bairro" class="form-label">Bairro</label>
                                                    <input type="text" class="form-control" id="bairro" oninput="handleInput(event)">
                                                </div>

                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6 text-start">
                                                    <label for="cidade" class="form-label">Cidade</label>
                                                    <input type="text" class="form-control" id="cidade" placeholder="" oninput="handleInput(event)">
                                                </div>

                                                <div class="col-md-6 text-start">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <select class="form-select" id="estado">
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
                                                <div class="col-md-6 text-start">
                                                    <label for="numero" class="form-label ">Número</label>
                                                    <input type="number" class="form-control " id="numero">

                                                </div>
                                                <div class="col-md-6 text-start">
                                                    <label for="complemento" class="form-label">Complemento</label>
                                                    <input type="text" class="form-control" id="complemento" placeholder="" oninput="handleInput(event)">
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="comprar-button d-flex justify-content-center mb-4 mt-4">
                                                    <input type="hidden" id="id_end_edit" value="">
                                                    <input type="submit" class="btn btn-warning cadastrar" id="btn_cadastrar" value="Cadastrar">
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
                    <div><span>Qtd Produtos</span><span id="qtd_prod"><?php echo($_GET["qtd_prod"]);?></span></div>
                    <div><span>Sub-total</span><span id="sub_total">R$ <?php echo($_GET["subtotal"]);?></span></div>
                    <div><span>Frete</span><span id="val_frete">R$0,00</span></div>
                </div>

                <footer class="rounded bg-transparent" style="border: 1px solid black">
                    <span>Total</span>
                    <span id="total">R$ <?php echo($_GET["subtotal"]);?></span>
                </footer>
            </div>

            <div class="row">
                <div class="comprar-button d-flex justify-content-center mb-4 mt-1">
                    <input type="submit" class="btn btn-warning avancar" id="btn_avancar" value="Finalizar Compra">
                </div>
            </div>
        </aside>

    </div>


    <div class="row">
        <hr class="opacity-0" style="border: 45px solid transparent">
    </div>

</div>

<script src="../js/cadastro_endereco.js"></script>
<script src="../js/masks.js"></script>

</html>


<?php

include("../header_footer/footer.php");

?>