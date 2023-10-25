<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES["imagem"])) {
        $nomeArquivo = $_FILES["imagem"]["name"];
        //caminho imagem
        $caminhoCompleto = "../imagens_produto/" . $nomeArquivo;

        
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {
          
            //PEGAR CAMPOS DO FORM
            $nome_produto = $_POST["nome_produto"];
            $descricao = $_POST["descricao"];
            $fornecedor = $_POST["id_fornecedor"];
            $categoria = $_POST["categoria"];
            $genero = $_POST["id_genero"];
            $imagem = $caminhoCompleto;
            
            $query_nome = "SELECT * FROM tb_produto WHERE nome_produto = '".$nome_produto."';";

            $conf_nome = "N";

            $result_nome = mysqli_query($conn, $query_nome);

            if($result_nome->num_rows > 0){
                $conf_nome = "S";

                if($conf_nome == "True"){
                    echo "PRODUTO já cadastrado!";
                    die();
                }else{
                    query_produto: "INSERT INTO tb_produto(nome_produto, descricao, fornecedor,categoria, genero, imagem) 
                    VALUES('".$nome_produto."', '".$descricao."', '".$fornecedor."', '".$categoria."','".$genero."','".$imagem."') ;";

                    if(mysqli_query($conn, $query_produto)){
                        echo "True";
                    }
                } 

            }

            //CRIAR A QUERY
            $query_produto = "INSERT INTO tb_produto(nome_produto, descricao, id_fornecedor, categoria, if_genero, local_img) 
            VALUES('".$nome_produto."','".$descricao."', '".$fornecedor."', '".$categoria."', '".$genero."', '".$imagem."');";

            // FAZER CONFERENCIA E DEPOIS O INSERT NO BANCO
            if (mysqli_query($conn, $query_produto)){
                echo "True";
            }else{
                mysqli_error($conn);
            }

            
        } else {            
            echo "Erro ao salvar a imagem.";
        }
    } else {       
        echo "Erro: Nenhuma imagem foi enviada.";
    }
} else {
    echo "Erro: Solicitação inválida.";
}
