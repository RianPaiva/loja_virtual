<?php
include("../conexoes/conexao_bd.php");



if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] == "cad_fornecedor") {


        $query = "SELECT * FROM tb_fornecedor WHERE razao_social LIKE '%" .
            $_POST["query"] . "%' ORDER BY razao_social;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li style='color:blue' value=" . $row["id_fornecedor"] . ">" .
                    $row["razao_social"] . "</li>";
            }
        } else {
            $output .= '<li>Cliente não encontrado</li>';
        }
        $output .= '</ul>';
    } elseif ($_POST["metodo"] == "cad_produto") {

        $query = "SELECT * FROM tb_fornecedor WHERE razao_social LIKE '%" .
            $_POST["query"] . "%' AND status = 1 ORDER BY razao_social;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li style='color:blue' value=" . $row["id_fornecedor"] . ">" .
                    $row["razao_social"] . "</li>";
            }
        } else {
            $output .= '<li>Cliente não encontrado</li>';
        }
        $output .= '</ul>';
    }

    echo $output;
}
