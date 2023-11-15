<?php
include("../conexoes/conexao_bd.php");


if (isset($_POST["email"]) || isset($_POST["password"])) {

    if (strlen($_POST["email"]) == 0) {
        echo "<script> alert('Prencha seu email corretamente!') </script>";
    } else if (strlen($_POST["password"]) == 0) {
        echo "<script> alert('Prencha sua senha corretamente!') </script>";
    } else {

        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);



        $sql = "SELECT * FROM tb_usuario WHERE email = '" . $email . "' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows  == 1) {

            $tbl = $result->fetch_assoc();

            if (password_verify($password, $tbl['senha'])) {

                $id_cliente =  $tbl['id_usuario'];
                $nome_usuario = $tbl['nome'];

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['nome'] = $nome_usuario;

                header("Location: index.php");
            } else {
                echo "<script> alert('Senha incorreta!') </script>";
            }
        } else {
            echo "<script> alert('Email ou senha incorretos!') </script>";
        }
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="../css/style_login_adm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/login.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Oswald', sans-serif;">
    <div class="container">
        <div class="form-image">
            <img src="../imagens/logo_principal.png">
        </div>
        <div class="form">

            <div class="form-header">
                <div class="title">
                    <h1> ÁREA DO ADM </h1>
                </div>
            </div>


            <form action="" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <label for="Email"> Email </label>
                        <input id="email" type="text" name="email" id="email" placeholder="Digite seu email" required>
                    </div>

                    <div class="input-box">
                        <label for="password"> Senha </label>
                        <input id="password" type="password" name="password" id="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="continue-button">
                        <input type="submit" class="btn btn-warning continue" id="btn_login" value="Login">
                    </div>
                </div>
            </form>


        </div>

<script src="../js/login_adm.js"></script>

</body>