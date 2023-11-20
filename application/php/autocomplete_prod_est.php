<?php
include("../conexoes/conexao_bd.php");




if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] == "cad_prod_estoque") {


        $query = "SELECT a.*, b.nome_produto FROM tb_item_estoque AS a INNER JOIN tb_produto AS b ON a.id_produto = b.id_produto
         WHERE b.nome_produto LIKE '%" .
            $_POST["query"] . "%' ORDER BY b.nome_produto;";
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



?>