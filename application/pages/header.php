<?php

$login_feito = "N";

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['id_cliente'])){
    $login_feito = "S";
}

include("../conexoes/conexao_bd.php"); 
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="container">

            <!-- navbar -->
            <nav class="navbar navbar-expand fixed-top">

                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="../imagens/menu.png" alt="">
                </button>

                <a class="navbar-brand justify-content-start" href="#"><img class="img_logo" src="..\imagens\lavechiastoresemfundo.png" alt="Lavechia Store" width="250" height="40"></a>

                <div class="navbar-collapse">
                </div>

                <form class="d-flex me-5">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                </form>

                <div class="side-nave-button p-2 me-3">

                    <a href="">
                        <img class="menu" src="../imagens/carrinho.png" alt="menu">
                    </a>
                </div>

                <div class="side-nave-button p-2 me-5 nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <img class="menu" src="../imagens/usuario.png" alt="menu"> </a>
                    <ul class="dropdown-menu dropdown-menu-lg-start">
                        <li><a class="dropdown-item" href="#"> Configurações </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                            if($login_feito == "S"){
                        ?>
                            <li><a class="dropdown-item" href="../php/logout.php"> Sair </a></li>
                        <?php
                            }else{
                        ?>                        
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <?php
                            }
                        ?>
                       

                    </ul>
                </div>
            </nav>

            <!-- Off canvas -->
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Masculino</a></li>
                        <li><a href="#">Feminino</a></li>
                        <li><a href="#">Bonés</a></li>
                        <li><a href="#">Camisas</a></li>
                        <li><a href="#">Tênis</a></li>
                    </ul>
                </div>
            </div>    

        </div>
    </header>

</body>

</html>