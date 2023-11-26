<?php
include("../conexoes/conexao_bd.php");

if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] === "cad_usuario") {


        $query = "SELECT * FROM tb_usuario WHERE nome LIKE '%" .
            $_POST["query"] . "%' ORDER BY nome;";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output .= "<li style='color:blue' value='" .
                    $row["id_usuario"] . "'>".$row['nome']." ".$row["sobrenome"]."</li>";
            }
        } else {
            $output .= '<li>Nome não encontrado</li>';
        }
        $output .= '</ul>';
    } 
    echo $output;
}
