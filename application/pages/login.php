<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="../css/style_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/login.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../imagens/logo_principal.png">
        </div>
        <div class="form">

            <div class="form-header">
                <div class="title">
                    <h1> Login </h1>
                </div>
                <input type="button" class="btn btn-warning golden"  id="btn_cadastro" value="Cadastre-se">
            </div>


            <form>
                <div class="input-group">
                    <div class="input-box">
                        <label for="Email"> Email </label>
                        <input id="email" type="text" name="email" placeholder="Digite seu email" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>


                    <div class="esquecisenha">
                        <h6><a href="">Esqueci Senha</a></h6>
                    </div>

                    <div class="continue-button">
                        <input type="button" class="btn btn-warning continue"  id="btn_login" value="Continue">
                    </div>
                </div>
            </form>


        </div>



</body>

</html>