<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if ($_POST["metodo"] == "cadastrar") {

        // Verifica se um arquivo de imagem foi enviado
        if (isset($_FILES["imagem"])) {
            $nomeArquivo = $_FILES["imagem"]["name"];
            //caminho imagem
            $caminhoCompleto = "../imagens_produto/" . $nomeArquivo;


            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {

                //PEGAR CAMPOS DO FORM
                $nome_produto = $_POST["nome_produto"];
                $fornecedor = $_POST["id_fornecedor"];
                $categoria = $_POST["id_categoria"];
                $genero = $_POST["genero"];
                $imagem = $caminhoCompleto;
                $descricao = $_POST["descricao"];

                //QUERY VERIFICAÇÃO SE JÁ EXISTE ESTE REGISTRO
                $query_nome = "SELECT * FROM tb_produto WHERE nome_produto = '" . $nome_produto . "' LIMIT 1;";
                $result_nome = mysqli_query($conn, $query_nome);

                if ($result_nome->num_rows > 0) {
                    echo "PRODUTO já cadastrado!";
                    die();
                } else {
                    $query_produto = "INSERT INTO tb_produto(nome_produto, id_fornecedor,id_categoria, genero, local_img, descricao) 
                VALUES('" . $nome_produto . "','" . $fornecedor . "','" . $categoria . "','" . $genero . "','" . $imagem . "','" . $descricao . "');";

                    if (mysqli_query($conn, $query_produto)) {
                        echo "True";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            } else {
                echo "Erro ao salvar a imagem.";
            }
        } else {
            echo "Erro: Nenhuma imagem foi enviada.";
        }
    } elseif ($_POST["metodo"] == "alterar") {
        //VERIFICA ALTERAÇÃO DAS IMAGENS DO PRODUTO
        if ($_POST["fl_altera_img"] == 1) {

            // Verifica se um arquivo de imagem foi enviado
            if (isset($_FILES["imagem"])) {
                $nomeArquivo = $_FILES["imagem"]["name"];
                //caminho imagem
                $caminhoCompleto = "../imagens_produto/" . $nomeArquivo;

                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {

                    //PEGAR CAMPOS DO FORM
                    $id_produto = $_POST["id_produto"];
                    $nome_produto = $_POST["nome_produto"];
                    $fornecedor = $_POST["id_fornecedor"];
                    $categoria = $_POST["id_categoria"];
                    $genero = $_POST["genero"];
                    $imagem = $caminhoCompleto;
                    $descricao = $_POST["descricao"];

                    //QUERY CASO HAJA ALTERAÇÃO DE IMAGEM
                    $query_produto = "UPDATE tb_produto SET 
                    nome_produto = '" . $nome_produto . "',
                    id_fornecedor = " . $fornecedor . ",
                    id_categoria = " . $categoria . ",
                    genero = '" . $genero . "',
                    local_img= '" . $caminhoCompleto . "',
                    descricao = '" . $descricao . "'
                    WHERE id_produto = " . $id_produto . ";";
                } else {
                    echo "Erro ao salvar a imagem.";
                }
            } else {
                echo "Erro: Nenhuma imagem foi enviada.";
            }
        } else {
            //PEGAR CAMPOS DO FORM
            $id_produto = $_POST["id_produto"];
            $nome_produto = $_POST["nome_produto"];
            $fornecedor = $_POST["id_fornecedor"];
            $categoria = $_POST["id_categoria"];
            $genero = $_POST["genero"];
            $descricao = $_POST["descricao"];
            //QUERY CASO NÃO HAJA ALTERAÇÃO DE IMAGEM
            $query_produto = "UPDATE tb_produto SET 
             nome_produto = '" . $nome_produto . "',
             id_fornecedor = " . $fornecedor . ",
             id_categoria = " . $categoria . ",
             genero = '" . $genero . "',
             descricao = '" . $descricao . "'
             WHERE id_produto = " . $id_produto . ";";
        }

        $query_nome = "SELECT * FROM tb_produto WHERE 
        nome_produto = '" . $nome_produto . "' AND id_produto <> ".$id_produto." LIMIT 1;";
        $result_nome = mysqli_query($conn, $query_nome);

        if ($result_nome->num_rows > 0) {
            echo "NOME já CADASTRADO em OUTRO produto!";
            die();
        } else {

            if (mysqli_query($conn, $query_produto)) {
                echo "True";
            } else {
                echo mysqli_error($conn);
            }
        }
    }
}
