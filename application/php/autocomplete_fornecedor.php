<?php
include("../conexoes/conexao_bd.php");



if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] == "cad_fornecedor") {


        $query = "SELECT * FROM tb_fornecedor WHERE razao_social LIKE '%" .
            $_POST["query"] . "%' ORDER BY razao_social;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled list-group dropdown-menu" style="transform: translate3d(0px, -30px, 0px); background-color: rgba(0,0,0,0.0); border: none !important;">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li class='list-group-item list-group-item-action' style='color:blue' class='list-group-item list-group-item-action' value=" . $row["id_fornecedor"] . ">" .
                    $row["razao_social"] . "</li>";
            }
        } else {
            $output .= '<li class="list-group-item list-group-item-action">Fornecedor não encontrado</li>';
        }
        $output .= '</ul>';
    } elseif ($_POST["metodo"] == "cad_produto") {

        $query = "SELECT * FROM tb_fornecedor WHERE razao_social LIKE '%" .
            $_POST["query"] . "%' AND status = 1 ORDER BY razao_social;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled list-group dropdown-menu" style="transform: translate3d(0px, -4px, 0px); background-color: rgba(0,0,0,0.0); border: none !important;">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li class='list-group-item list-group-item-action' style='color:blue' value=" . $row["id_fornecedor"] . ">" .
                    $row["razao_social"] . "</li>";
            }
        } else {
            $output .= '<li class="list-group-item list-group-item-action">Fornecedor não encontrado</li>';
        }
        $output .= '</ul>';
    }

    echo $output;
}
