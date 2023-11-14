<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");

$id_fornecedor = $_POST["id_fornecedor"];
$razao_social = $_POST["razao_social"];
$cnpj = CleanCnpj($_POST["cnpj"]);


$sucesso = "S";
$return = "";

//COMEÇANDO QUERY

$query = "SELECT * FROM tb_fornecedor WHERE ";


//TESTAR SE TEM ID
if($id_fornecedor !== "" && $id_fornecedor !== null){    
    $query .= "id_fornecedor = " .$id_fornecedor." LIMIT 1;";
}else{
    //SE TIVER RAZAO
    if($razao_social !== "" && $razao_social !== null){
        $query .= "razao_social ='" .$razao_social."' LIMIT 1;";
    }else{
        // SE TIVER CNPJ
        if($cnpj !== "" && $cnpj !== null){
            $query .= "cnpj ='".$cnpj."' LIMIT 1;";            
        }else{
           $return = "Informe um FORNECEDOR para prosseguir!";
           echo $return;
           die();            
        }
    }
}



if($result_query = mysqli_query($conn, $query)){
    $tbl = $result_query->fetch_assoc();
    $return .= $tbl["id_fornecedor"] . "##";
    $return .= $tbl["razao_social"] . "##";
    $return .= $tbl["cnpj"] . "##";
    $return .= $tbl["email"] . "##";
    $return .= $tbl["telefone"]. "##";
    $return .= $tbl["id_pais"]. "##";
    $return .= $tbl["cidade"]. "##";
    $return .= $tbl["logradouro"]. "##";
    $return .= $tbl["id_estado"]. "##";
    $return .= $tbl["complemento"]. "##";
    $return .= $tbl["num_endereco"] . "##";
    $return .= $tbl["status"];
}else{
    $sucesso = "N";
}


if($sucesso == "S"){
    echo "Sucesso" . "##";
    echo $return;
}else{
    echo "Erro ao pesquisar" . "##";   
}
