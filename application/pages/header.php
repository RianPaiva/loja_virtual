<?php


/*include("../conexoes/conexao_bd.php");*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lavechia Store </title>

    <!--import bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style_header.css">
    <a target="_blank" href="https://icons8.com/icon/15893/carrinho-de-compras">carrinho</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>

</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand fixed-top">

                <!-- menu da barra de navegação-->
                <div class="side-nave-button p-2 me-3">
                    <img class="menu" src="../imagens/MENU.png" alt="menu">
                </div>



                <a class="navbar-brand justify-content-start" href="#"><img class="img_logo" src="..\imagens\lavechiastoresemfundo.png" alt="Lavechia Store" width="250" height="40"></a>

                <div class="navbar-collapse">
                </div>
                
                <ul class="nav justify-content-center me-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Suporte</a>
                    </li>

                </ul>

                <form class="d-flex me-5">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                </form>

                <div class="side-nave-button p-2 me-3">

                    <a href="">
                        <img class="menu" src="../imagens/CARRINHO.png" alt="menu">
                    </a>
                </div>


                <div class="side-nave-button p-2 me-3">
                    <a href="">
                        <img class="menu" src="../imagens/USUARIO.png" alt="menu">
                    </a>
                </div>


        </div>

        </nav>
        </div>
    </header>

</body>

</html>