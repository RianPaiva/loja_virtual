<?php
include("../conexoes/conexao_bd.php");
include("./send_mail.php");
include("../php/clean_string.php");

$nome = mysqli_real_escape_string($conn, $_POST["primeiro_nome"]);
$sobrenome = mysqli_real_escape_string($conn, $_POST["sobrenome"]);
$celular = RemoveSpecialChar(mysqli_real_escape_string($conn, $_POST["celular"]));
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$senha = mysqli_real_escape_string($conn, $_POST["senha"]);
$conf_senha = mysqli_real_escape_string($conn, $_POST["conf_senha"]);
$genero = mysqli_real_escape_string($conn, $_POST["genero"]);

/*
CONFERE SE O USUARIO JÁ EXISTE (EMAIL E CPF)
*/
$conf_email = "N";

//CONFERE EMAIL
$query_email = "SELECT * FROM tb_cliente WHERE email = '" . $email . "' LIMIT 1; ";
$result_email = mysqli_query($conn, $query_email);
if ($result_email->num_rows > 0) {
    $conf_email = "S";
}

//TESTE DO RESULTADO DAS CONSULTAS EMAIL E CPF
if ($conf_email == "S") {
    echo "EMAIL já cadastrado";
    die();
} else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "Email inválido";
        die();
    }

    //TRATAMENTO DADOS
    if ($senha != $conf_senha) {
        echo "SENHA e CONFIRMAÇÃO  não coincidem";
        die();
    } else {

        //CRIPTOGRAFIA SENHA
        $encript_senha = password_hash($senha, PASSWORD_DEFAULT);

        //EXECUTANDO QUERY CADASTRO
        $query_cadastro = "INSERT INTO tb_cliente(nome, sobrenome, genero, celular, email, senha) 
    VALUES('" . $nome . "', '" . $sobrenome . "', '" . $genero . "' ,'" . $celular . "', '" . $email . "', '" . $encript_senha . "');";

        if (mysqli_query($conn, $query_cadastro)) {
            //EMAIL CONFIRMAÇÃO
            // Assunto da mensagem 
            $subject = "Bem Vindo(a) a Lavechia Store!";

            $mensagem = '

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">

</head>

<style>
    body {
        margin: 0;
        font-family: "Oswald", sans-serif;
    }

    .bg-black {
        background-color: black;
        height: 192.13px;
        width: 100%;
        text-align: center;
    }

    .bg-black-b {
        background-color: black;
        height: 192.13px;
        width: 100%;
    }

    .bg-white {
        background-color: white;
        height: 804px;
        width: 100%;
        font-size: 30px;
    }

    .bg-gold {
        background-color: #CFB53B;
        height: 90px;
        width: 100%;
        font-size: 50px;
        text-align: center;
    }

    img {
        width: 700px;
        height: 192.13px;
    }

    p {
        margin: 0;
    }

    .p-text {
        margin-top: 70px;
        display: flex;
        text-indent: 0;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }

    .p-text-2 {
        margin-bottom: 70px;
        display: flex;
        text-indent: 0;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }

    button {
        height: 70px;
        width: 243.4px;
        border-radius: 10px;
        font-size: 30px;
        background-color: #CFB53B;
        cursor: pointer;
        border: none;
        display: block;
        margin: 0 auto;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    @media (max-width: 768px) {

        .bg-gold {
            font-size: 35px;
        }

        .bg-white {
            margin-bottom: 100px;
            margin-top: 100px;
        }

        .bg-black-b {
            margin-bottom: 0px;
        }

        .p-text {
            font-size: 20px;
            margin-top: 50px;
        }

        .p-text-2 {
            font-size: 20px;
        }

        igm {
            width: 360px;
            height: 192.13;
        }

    }
</style>

<body>

    <div class="bg-black">

        <picture>
            <source media="(max-width: 768px)" srcset="lavechiastoresemfundo.png">
            <img src="lavechiastore.png" alt="Logo Lavechia Store">
        </picture>

    </div>

    <div class="bg-gold">

        <p><b>SEJA BEM VINDO!</b></p>

    </div>

    <div class="bg-white">

        <p class="p-text">
            Olá, (nome do cliente)! <br> <br>
            Sua conta na Lavechia Store está quase pronta. <br>
            Para ativá-la, por favor confirme <br>
            o seu endereço de Email clicando no link abaixo.
        </p>

        <button><b>Ativar a Conta</b></button>

        <p class="p-text-2">
            Sua conta não será ativada até que seu Email seja <br> confirmado. <br> <br>
            Se você não se cadastrou na Lavechia Store <br> recentemente, por favor ignore este Email. <br> <br>
            Agradecemos pelo seu interesse e estamos <br> ansiosos pela sua primeira compra! <br> <br>
        </p>

    </div>

    <div class="bg-gold">
        <p><b>@LAVECHIA__STORE</b></p>
    </div>

    <div class="bg-black-b">

    </div>

</body>

</html>

';




            $send_result = send_mail( $email,$nome, $subject,$mensagem);
            if ($send_result == true) {
                echo "Sucesso";
            }
        } else {
            echo mysqli_error($conn);
        }
    }
}
