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
            $nomeProduto = $_POST["nome_produto"];
            $descricao = $_POST["descricao"];
            $fornecedor = $_POST["id_fornecedor"];
            $categoria = $_POST["categoria"];
            $genero = $_POST["id_genero"];
            $imagem = $_POST["imagem"];
            

            //CRIAR A QUERY
            $query_produto = "SELECT * FROM tb_produto;";

            // FAZER CONFERENCIA E DEPOIS O INSERT NO BANCO
            $result_produto = mysqli_query($conn, $query_produto);

            
        } else {            
            echo "Erro ao salvar a imagem.";
        }
    } else {       
        echo "Erro: Nenhuma imagem foi enviada.";
    }
} else {
    echo "Erro: Solicitação inválida.";
}
