<?php
include("../header_footer/header.php");


echo "INDEX.PHP";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/style_home_page.css">


</head>

<body>

    <div class="container-expanded">

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../imagens/banner_adidas_preto.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../imagens/banner_adidas_verde.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../imagens/banner_puma.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <div class="container">

        <div class="row">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    NOVIDADES
                </div>
                </p>
            </div>

        </div>
        <div class="row justify-content-around mb-4">

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-wmns-nike-dunk-low-se-just-do-it-white.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> WMNS Nike Dunk Low </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-nike-dunk-low-retro-cargo-khaki-mystic-red.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Nike Dunk Low Retro </h5>
                        <p class="card-text text-center">R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-jordan-luka-2-bred.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Jordan Luka 2 </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-around mb-4">

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-wmns-nike-dunk-low-se-just-do-it-white.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> WMNS Nike Dunk Low </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-nike-dunk-low-retro-cargo-khaki-mystic-red.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Nike Dunk Low Retro </h5>
                        <p class="card-text text-center">R$200,00 </p>
                    </div>
                </div>
            </div>

            <div class="col col-custom mb-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="..\imagens\tenis-jordan-luka-2-bred.png" alt="Imagem de capa do card" width="250" height="250">
                    <div class="card-body">
                        <h5 style="font-size: 16px;" class="card-title text-center"> Jordan Luka 2 </h5>
                        <p class="card-text text-center"> R$200,00 </p>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="container-fluid bg-custom">

        <div class="row">
            <div class="col mt-5">
                <h1 class="text-center color-gold"> MARCAS </h1>
            </div>
        </div>

        <div class="row justify-content-center mt-5">

            <div class="col-sm-2 text-center">
                <img class="justify-content-center img-fluid img-marca " src="../imagens/nike.png" alt="Nike" height="50px" width="150px">
            </div>
            <div class="col-sm-2 text-center">
                <img class="justify-content-center img-fluid img-marca " src="../imagens/adidas.png" alt="Adidas" height="150px" width="150px">
            </div>
            <div class="col-sm-2 text-center">
                <img class="justify-content-center img-fluid img-marca " src="../imagens/oakley.png" alt="Oakley" height="150px" width="150px">
            </div>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <div class="col">
                <p>
                <div class="text-container" style="font-weight:500">
                    NOSSO INSTAGRAM
                </div>
                </p>
            </div>

        </div>

        <div class="row justify-content-center mt-4">
            <?php include("../embed/embed_instagram.php"); ?>
        </div>

</body>

</html>

<?php
include("../header_footer/footer.php");
?>