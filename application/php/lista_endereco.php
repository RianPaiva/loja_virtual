<?php
include("../conexoes/conexao_bd.php");
$id_cliente = $_POST["id_cliente"];

if ($_POST["metodo"] == "buscar_enderecos") {
    $sql_endereco = "SELECT a.*, b.nome, b.uf FROM tb_endereco AS a INNER JOIN tb_estado_br AS b ON a.estado = b.id_estado WHERE id_cliente =" . $id_cliente . ";";
    $res_endereco = mysqli_query($conn, $sql_endereco);
    if ($res_endereco->num_rows > 0) {
        while ($tbl_endereco = $res_endereco->fetch_assoc()) {
            echo '
                            
                            <div class="row mt-3">
                            <div class="col-lg-12">    
                                <div class="card">
                                    <div class="card-body">    
                                        <div class="row mt-3">    
                                            <label class="">
                                                <div class="col-md-2 position-absolute top-50 ms-2 translate-middle">
                                                    <input type="radio" id="sel_endereco" name="endereco" value="' . $tbl_endereco["id_endereco"] . '">
                                                </div>    
                                                <div class="col-md-10 ms-5">    
                                                    <div class="row text-start">
                                                        <h4>Rua: ' . $tbl_endereco["rua"] . ', ' . $tbl_endereco["numero"] . ' - ' . $tbl_endereco["bairro"] . ', ' . $tbl_endereco["cidade"] . '- ' . $tbl_endereco["uf"] . '</h4>
                                                    </div>    
                                                    <div class="row text-start">
                                                        <div class="col-md-3">
                                                            <H6>CEP: ' . $tbl_endereco["cep"] . '</h6>
                                                        </div>
                                                        <div class="col-md-3 edit">
                                                            <i class="fa fa-edit" style="font-size:24px" onclick="editarEndereco(' . $tbl_endereco["id_endereco"] . ')"></i> Editar
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
}
