<?php
include("../conexoes/conexao_bd.php");



if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] == "cad_produto") {


        $query = "SELECT * FROM tb_produto WHERE nome_produto LIKE '%" .
            $_POST["query"] . "%' ORDER BY nome_produto;";
        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li style='color:blue' value=" . $row["id_produto"] . ">" .
                    $row["nome_produto"] . "</li>";
            }
        } else {
            $output .= '<li>Produto não encontrado</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
    


    // FORNECEDOR
    if ($_POST["metodo"] == "prod_estoque") {


        $query = "SELECT * FROM tb_produto WHERE nome_produto LIKE '%" .
            $_POST["query"] . "%' ORDER BY nome_produto;";
        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li style='color:blue' value=" . $row["id_produto"] . ">" .
                    $row["nome_produto"] . "</li>";
            }
        } else {
            $output .= '<li>Produto não encontrado</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
}
