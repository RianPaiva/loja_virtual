<?PHP

include("../header_footer/header.php");

?>

<link rel="stylesheet" href="../css/style_produtos.css">

<body>
    <div class="container-fluid">
        <div class="row filter-container position-fixed mt-4" id="row-size">

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

            <div class="row justify-content-start" style="background-color: #cfb53b">

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
            <div class="container-expanded bg-custom"></div>
        </div>







        <div class="content-container">
            <div class="container">

                <div class="row justify-content-around mb-4">


                    <?php
                    $sql_produto = "SELECT a.*, b.local_img, b.nome_produto FROM tb_item_estoque AS a 
                    INNER JOIN tb_produto AS b 
                    ON a.id_produto = b.id_produto 
                    WHERE a.disponivel = 1";

                    $res_produto = mysqli_query($conn, $sql_produto);
                    if ($res_produto->num_rows > 0) {
                        $num_prod = 0;

                        while ($tbl_produto = $res_produto->fetch_assoc()) {
                            if ($num_prod == 0) {
                                echo '<div class="row row-custom justify-content-around mb-4">';
                            }
                            echo '<div class="col col-custom mb-3">
                           <div class="card custom-card">
                                <img class="card-img-top" src="' . $tbl_produto['local_img'] . '" alt="Imagem de capa do card">
                               <div class="card-body">
                                   <h5 style="font-size: 16px;" class="card-title text-center">' . $tbl_produto['nome_produto'] . '</h5>
                                   <p class="card-text text-center">' . $tbl_produto['valor_venda'] . '</p>
                               </div>
                           </div>
                       </div>';
                            $num_prod += 1;

                            if ($num_prod == 3) {
                                echo '</div>';
                                $num_prod = 0;
                            }
                        }
                    }
                    ?>

                </div>

                <div class="row mt-5">
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
            <div class="row">
                <hr class="opacity-0 hr-custom">
            </div>
        </div>
    </div>
</body>

<?PHP

include("../header_footer/footer.php");

?>