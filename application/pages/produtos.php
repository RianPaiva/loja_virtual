<?PHP

include("header.php");

?>

<link rel="stylesheet" href="../css/style_produtos.css">

<body>
    <div class="container-fluid filter-container position-fixed mt-1">
        <div class="container-fluid mt-5">
            <div class="row">

                <div class="col">
                    <p>
                    <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500 ">
                        <?php
                        echo $_GET["categoria"];
                        ?>
                    </div>
                    </p>
                </div>

            </div>
        </div>


        <div class="container-expanded" style="background-color: #cfb53b">

            <div class="row justify-content-start ms-2">

                <div class="col-sm-1 text-center">
                    <img src="../imagens/filtro.png" alt="filtro" height="25" width="25">
                </div>

                <div class="col-sm-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            CATEGORIA
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Tênis</a>
                            <a class="dropdown-item" href="#" target="_blank">Camisetas</a>
                            <a class="dropdown-item" href="#" target="_blank">Bonés</a>
                        </div>
                    </li>
                </div>

                <div class="col-sm-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            GÊNERO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Masculino</a>
                            <a class="dropdown-item" href="#" target="_blank">Feminino</a>
                        </div>
                    </li>
                </div>

                <div class="col-sm-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            TAMANHO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"> 35 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 36 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 37 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 38 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 39 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 40 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 41 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 42 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 43 </a>
                            <a class="dropdown-item" href="#" target="_blank"> 44 </a>
                        </div>
                    </li>
                </div>

                <div class="col-sm-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            MARCA
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Nike</a>
                            <a class="dropdown-item" href="#" target="_blank">Adidas</a>
                            <a class="dropdown-item" href="#" target="_blank">Oakley</a>
                        </div>
                    </li>
                </div>

            </div>

        </div>

        <div class="container-expanded bg-custom"></div>

    </div>



    <div class="content-container">
        <div class="container">

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

            <div class="row d-flex">
                <nav class="bg-pagination" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</body>

<?PHP

include("footer.php");

?>