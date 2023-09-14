<?php

?>

<style>
    .bordered {
        border: 1px solid pink;
    }

    .background {
        background-color: black;
    }

    .title {
        color: #fff;
    }

    body {
        min-height: 100%;
        ackground-image: url("../imagens/dunk-preto-branco.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .img-logo {
        max-width: 50%;
        align-content: center;
        margin-top: 100px;
    }

    .img-container {
        text-align: center;

    }

    .container-login {
        margin-top: 15% !important;
        max-width: 60%;
        border-radius: 28px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Roboto', sans-serif;
    }

    .social-media {
        width: 35px;
    }

    .btn-enviar {
        border: none;
        background-color: #CFB53B !important;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-enviar:hover {
        transform: scale();
    }

    
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lavechia Store </title>

    <!--import bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
                <link rel="preconnect" href="https://fonts.gstatic.com/">
                    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
        </script>
</head>

<body class="vh-100">

    <div class="container-fluid vh-100">

        <div class="row vh-100">
            <div class="col-md-5 vh-100 background">

                <div class="img-container">
                    <img src="../imagens/lavechiastore.png" class="img-logo">
                </div>

                <form class="row p-md-5 border bg-light mx-auto container-login">

                    <div class="form-floating mb-auto">
                        <div class="row">
                            <label for="inputEmail"> Email </label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" />

                        </div>

                    </div>
                    <div class="form-floating mb-auto pt-2">
                        <div class="row">
                            <label for="inputPassword"> Senha </label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Senha" />
                        </div>

                        <div class="checkbox mb-auto pt-2">
                            <label>
                                <input type="checkbox" value="lembrar login"> Lembrar Login
                            </label>
                        </div>
                    </div>

                    <div class="form-floating mb-auto pt-2">
                        <div class="row">
                            <input type="submit" class="btn btn-enviar" class="form-control">
                        </div>

                        <div class="mt-3 d-flex justify-content-evenly" id="social_media">

                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>

                        </div>

                    </div>

                </form>

            </div>
            <div class="col-md-6 vh-100 ">


                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="">

                        <div class="carousel-item h-100 active" style="background-size: contain;">
                            <img src="../imagens/dunk-preto-branco.png" class="d-block w-50" alt="dunk-preto-branco">
                        </div>
                        <div class="carousel-item">
                            <img src="../imagens/puma.jpeg" class="d-block w-50" alt="puma">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>

</html>