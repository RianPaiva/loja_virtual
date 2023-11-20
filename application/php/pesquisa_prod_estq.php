<?php
include("../conexoes/conexao_bd.php");

$id_prod = $_POST["id_prod"];
$nome_prod = $_POST["nome_prod"];

if($_POST["metodo"] == "cad_prod_estq"){
    
$sucesso = "S";
$return = "";

//COMEÇANDO QUERY

$query = "SELECT a.*, b.nome_produto FROM tb_item_estoque AS a 
INNER JOIN tb_produto AS b ON a.id_produto = b.id_produto
WHERE ";


//TESTAR SE TEM ID
if($id_prod !== "" && $id_prod !== null){    
    $query .= "a.id_produto = " .$id_prod." LIMIT 1;";
}else{
    //SE TIVER NOME
    if($nome_prod !== "" && $nome_prod !== null){
        $query .= "b.nome_produto ='" .$nome_prod."' LIMIT 1;";
    }else{   
           $return = "Informe um ITEM DO ESTOQUE para prosseguir!";
           echo $return;
           die();            
    }
}

}


if($result_query = mysqli_query($conn, $query)){
    $tbl = $result_query->fetch_assoc();
    $return .= $tbl["id_produto"] . "##";
    $return .= $tbl["nome_produto"] . "##";
    $return .= $tbl["valor_venda"] . "##";
    $return .= $tbl["dt_hr_entrada"] . "##";
    $return .= $tbl["lista_tamanhos"]. "##";
}else{
    $sucesso = "N";
}


if($sucesso == "S"){
    echo "Sucesso" . "##";
    echo $return;
}else{
    echo "Erro ao pesquisar" . "##";   
}

?>