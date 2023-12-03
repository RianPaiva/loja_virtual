<?php
include("../conexoes/conexao_bd.php");
include("clean_string.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if ($_POST["metodo"] == "cadastrar") {



        //VERIFICA SE EXISTE A PRIMEIRA E A SEGUNDA IMG E IMPÕE QUE SEJAM CADASTRADAS
        if ((isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) && (isset($_FILES["imagem_2"]) && !empty($_FILES["imagem_2"]))) {
            //CAMINHO DA PRIMEIRA IMG
            $nomeArquivo = $_FILES["imagem"]["name"];
            //caminho imagem
            $caminho1 = "../imagens_produto/" . $nomeArquivo;

            //CAMINHO DA SEGUNDA IMG
            $nomeArquivo_2 = $_FILES["imagem_2"]["name"];
            //caminho imagem
            $caminho2 = "../imagens_produto/" . $nomeArquivo_2;


            //SALVAR A TERCEIRA IMG OPCIONALMENTE
            if (isset($_FILES["imagem_3"]) && !empty($_FILES["imagem_3"])) {
                $nomeArquivo_3 = $_FILES["imagem_3"]["name"];

                $caminho3 = "../imagens_produto/" . $nomeArquivo_3;
            }
        } else {
            //RETORNO SE FALTAR AS 2 IMG
            echo "Para cadastrar o produto insira 2 imagens no mínimo";
            die();
        }

        ///////////////////
        //SALVAR AS IMG
        //////////////////
        if (isset($caminho1) && isset($caminho2)) {
            if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho1)) {
                echo "Erro ao salvar a Imagem 1";
                die();
            }


            if (!move_uploaded_file($_FILES["imagem_2"]["tmp_name"], $caminho2)) {
                echo "Erro ao salvar a Imagem 2";
                unlink($caminho1);
                die();
            }

            //VERIFICA SE IRÁ SALVAR A TERCEIRA IMG
            if (isset($caminho3)) {
                //SALVA A TERCEIRA IMG
                if (!move_uploaded_file($_FILES["imagem_3"]["tmp_name"], $caminho3)) {
                    echo "Erro ao salvar a Imagem 3";
                    unlink($caminho1);
                    unlink($caminho2);
                    die();
                }
            }
        } else {
            echo "Sem imagens para salvar";
            die();
        }

        //PEGAR CAMPOS DO FORM
        $nome_produto = $_POST["nome_produto"];
        $fornecedor = $_POST["id_fornecedor"];
        $categoria = $_POST["id_categoria"];
        $genero = $_POST["genero"];
        $imagem = $caminho1;
        $imagem_2 = $caminho2;
        if (isset($caminho3)) {
            $imagem_3 = $caminho3;
        }
        $descricao = $_POST["descricao"];

        //QUERY VERIFICAÇÃO SE JÁ EXISTE ESTE REGISTRO
        $query_nome = "SELECT * FROM tb_produto WHERE nome_produto = '" . $nome_produto . "' LIMIT 1;";
        $result_nome = mysqli_query($conn, $query_nome);

        if ($result_nome->num_rows > 0) {
            echo "PRODUTO já cadastrado!";
            die();
        } else {

            if (isset($caminho3)) {
                //QUERY PARA 3 IMG                
                $query_produto = "INSERT INTO tb_produto(nome_produto, id_fornecedor,id_categoria, genero, local_img, local_img_2, local_img_3, descricao) 
                VALUES('" . $nome_produto . "','" . $fornecedor . "','" . $categoria . "','" . $genero . "','" . $imagem . "','" . $imagem_2 . "','" . $imagem_3 . "','" . $descricao . "');";
            } else {
                //QUERY PARA 2 IMG                
                $query_produto = "INSERT INTO tb_produto(nome_produto, id_fornecedor,id_categoria, genero, local_img, local_img_2, descricao) 
                 VALUES('" . $nome_produto . "','" . $fornecedor . "','" . $categoria . "','" . $genero . "','" . $imagem . "','" . $imagem_2 . "','" . $descricao . "');";
            }
            //EXECUTA E TESTA
            if (mysqli_query($conn, $query_produto)) {
                echo "True";
            } else {
                unlink($imagem);
                unlink($imagem_2);
                if (isset($imagem_3)) {
                    unlink($imagem_3);
                }
                echo mysqli_error($conn);
            }
        }
    }
    if ($_POST["metodo"] == "alterar") {

        //VALIDAR DADOS BASE
        if (isset($_POST["id_produto"])) {
            $id_produto = $_POST["id_produto"];
        } else {
            echo "Pesquise um produto para alterar";
            die();
        }

        if (isset($_POST["nome_produto"])) {
            $nome_produto = $_POST["nome_produto"];
        } else {
            echo "Nome não pode ser nulo!";
            die();
        }

        if (isset($_POST["id_fornecedor"])) {
            $id_fornecedor = $_POST["id_fornecedor"];
        } else {
            echo "Fornecedor não pode ser nulo!";
            die();
        }

        if (isset($_POST["id_categoria"])) {
            $id_categoria = $_POST["id_categoria"];
        } else {
            echo "Categoria não pode ser nula!";
            die();
        }

        if (isset($_POST["genero"])) {
            $genero = $_POST["genero"];
        } else {
            echo "Gênero não pode ser nulo!";
            die();
        }

        if (isset($_POST["descricao"])) {
            $descricao = $_POST["descricao"];
        } else {
            echo "Descrição não pode ser nula!";
            die();
        }


        //SELECT PARA VER DADOS ANTIGOS
        $slq_get_dados = "SELECT * FROM tb_produto WHERE id_produto = " . $_POST["id_produto"] . " LIMIT 1;";
        $result_dados = mysqli_query($conn, $slq_get_dados);
        if ($result_dados->num_rows > 0) {
            $tbl_dados = $result_dados->fetch_assoc();
            //PEGAR CAMINHO DAS 3 IMG ANTERIORES
            $old_img_1 = $tbl_dados["local_img"];
            $old_img_2 = $tbl_dados["local_img_2"];
            $old_img_3 = $tbl_dados["local_img_3"];
        } else {
            echo mysqli_error($conn);
        }

        //VERIFICA SE TEVE ALTERAÇÃO DAS IMAGENS
        if ($_POST["fl_altera_img"] == 1) {
            //RECEBE IMG1
            //CAMINHO DA PRIMEIRA IMG
            $nomeArquivo = $_FILES["imagem"]["name"];
            //caminho imagem
            $caminho1 = "../imagens_produto/" . $nomeArquivo;
        }
        //VERIFICA SE ALTERA IMG2
        if ($_POST["fl_altera_img_2"] == 1) {
            //RECEBE IMG1
            //CAMINHO DA PRIMEIRA IMG
            $nomeArquivo_2 = $_FILES["imagem_2"]["name"];
            //caminho imagem
            $caminho2 = "../imagens_produto/" . $nomeArquivo_2;
        }

        if ($_POST["fl_altera_img_3"] == 1) {
            //RECEBE IMG1
            //CAMINHO DA PRIMEIRA IMG
            $nomeArquivo_3 = $_FILES["imagem_3"]["name"];
            //caminho imagem
            $caminho3 = "../imagens_produto/" . $nomeArquivo_3;
        }




        ////////////////////////////
        //SALVA AS IMAGENS SE TIVER
        ////////////////////////////
        if ($_POST["fl_altera_img"] == 1) {
            if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho1)) {
                echo "Erro ao salvar a Imagem 1";
                die();
            }
        }

        if ($_POST["fl_altera_img_2"] == 1) {
            if (!move_uploaded_file($_FILES["imagem_2"]["tmp_name"], $caminho2)) {
                echo "Erro ao salvar a Imagem 2";
                if ($_POST["fl_altera_img"] == 1) {
                    unlink($caminho1);
                }
                die();
            }
        }

        if ($_POST["fl_altera_img_3"] == 1) {
            if (!move_uploaded_file($_FILES["imagem_3"]["tmp_name"], $caminho3)) {
                echo "Erro ao salvar a Imagem 3";
                if ($_POST["fl_altera_img"] == 1) {
                    unlink($caminho1);
                }
                if ($_POST["fl_altera_img2"] == 1) {
                    unlink($caminho2);
                }
                die();
            }
        }



        //QUERY UPDATE
        // UPADE BASE
        $query_update = "UPDATE tb_produto SET
        nome_produto = '" . $nome_produto . "',
        id_fornecedor = '" . $id_fornecedor . "',
        id_categoria = '" . $id_categoria . "',
        genero = '" . $genero . "',
        descricao = '" . $descricao . "'";

        //ADICIONANDO IMGENS ALTERADAS NA QUERY
        if (isset($caminho1)) {
            $query_update .= " , local_img = '" . $caminho1 . "'";
            $apaga_img1 = 1;
        }

        if (isset($caminho2)) {
            $query_update .= " , local_img_2 = '" . $caminho2 . "'";
            $apaga_img2 = 1;
        }

        if (isset($caminho3)) {
            $query_update .= " , local_img_3 = '" . $caminho3 . "'";
            $apaga_img3 = 1;
        }

        //FECHAR A QUERY
        $query_update .= " WHERE id_produto = ". $id_produto.";";

        //EXECUTA QUERY UPDATE
        if (mysqli_query($conn, $query_update)) {
            //APAGA IMAGENS ALTERADAS
            if (isset($apaga_img1) &&  $apaga_img1 == 1) {
                if(!($old_img_1  == '')){
                    unlink($old_img_1);
                }
            }

            if (isset($apaga_img2) && $apaga_img2 == 1) {
                if(!($old_img_2 == '')){
                    unlink($old_img_2);
                }
            }

            if (isset($apaga_img3) && $apaga_img3 == 1) {
                if(!($old_img_3  == '')){
                    unlink($old_img_3);
                }
               
            }

            echo "True";
        } else {
            //APAGA IMAGENS NOVAS
            //ADICIONANDO IMGENS ALTERADAS NA QUERY
            if (isset($caminho1)) {
               unlink($caminho1);
            }

            if (isset($caminho2)) {
                unlink($caminho2);
            }

            if (isset($caminho3)) {
               unlink($caminho3);
            }

            echo mysqli_error($conn);
        }
    }
}
