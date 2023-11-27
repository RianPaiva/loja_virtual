<?php
include("../conexoes/conexao_bd.php");

if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] === "cad_usuario") {


        $query = "SELECT * FROM tb_usuario WHERE nome LIKE '%" .
            $_POST["query"] . "%' ORDER BY nome;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled list-group dropdown-menu" style="transform: translate3d(0px, -30px, 0px); background-color: rgba(0,0,0,0.0); border: none !important;">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li class='list-group-item list-group-item-action' style='color:blue' value='" .
                    $row["id_usuario"] . "'>".$row['nome']." ".$row["sobrenome"]."</li>";
            }
        } else {
            $output .= '<li class="list-group-item list-group-item-action">Nome não encontrado</li>';
        }
        $output .= '</ul>';
    } 
    echo $output;
}
