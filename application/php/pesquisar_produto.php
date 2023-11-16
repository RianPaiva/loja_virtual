<?php
include("../conexoes/conexao_bd.php");

$id_produto = $_POST["id_produto"];
$nome_produto = $_POST["nome_produto"];

$sucesso = "S";
$return ="";

$query = "SELECT a.*, b.razao_social FROM tb_produto AS a  
INNER JOIN tb_fornecedor AS B ON a.id_fornecedor = b.id_fornecedor WHERE ";



if($id_produto !== "" && $id_produto !== null){
    $query .= "id_produto = " .$id_produto." LIMIT 1;";
}
else{
    if($nome_produto !== "" && $nome_produto !== null){
        $query .= "nome_produto = " .$nome_produto." LIMIT 1;";
    }else{
        $return = "Informe o PRODUTO para prosseguir";
        echo $return;
        die();
    }

}



if ($result_query = mysqli_query($conn, $query) ){
    $tbl = $result_query->fetch_assoc();

    $return .= $tbl["id_produto"]. "##";
    $return .= $tbl["nome_produto"] . "##";
    $return .= $tbl["razao_social"] . "##";
    $return .= $tbl["id_fornecedor"] . "##";    
    $return .= $tbl["id_categoria"] . "##";
    $return .= $tbl["genero"] . "##";
    $return .= $tbl["descricao"] . "##";
    $return .= $tbl["local_img"] . "##";
    
}else{
    $sucesso = "N";
}


if ($sucesso === "S"){
    echo "Sucesso" . "##";
    echo $return;
}
else{
    echo "Erro ao pesquisar";
    echo mysqli_error($conn);
}


?>