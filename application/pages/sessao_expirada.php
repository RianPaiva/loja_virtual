<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lavechia Store </title>

    <!--import bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style_sessao_expirada.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Google charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);
    </script>

</head>

<link href="../css/sessao_expirada.css" rel="stylesheet">

<div class="container-fluid bg-color margin-top">

    <div class="row">

        <div class="row">

            <div class="align-items-center text-containerall">
                <img class="img_logo" src="..\imagens\logo-new.png" alt="Lavechia Store" width="350" height="">
            </div>

        </div>

        <div>
            <h1 class="text-container mb-2 mt-4"> Você foi desconectado </h1>
        </div>

        <div>
            <h4 class="text-desconectado mb-2 mt-4"> Sua sessão expirou. Clique em "Fazer Login" para ser
                direcionado para a pagina de login</h4>
        </div>

        <form action="" method="">
            <div class="continue-button text-center" href="login.php">
                <input type="submit" class="btn btn-warning continue" id="btn_login" value="Fazer Login">
            </div>

        </form>

    </div>

</div>
