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
    </script>
</head>

<body class="vh-100">

    <div class="container-fluid vh-100">

        <div class="row vh-100">
            <div class="col-md-5 vh-100 background">
                <div class="row  d-flex justify-content-center">
                    <h1 class="title text-center">Lavechia Store</h1>
                </div>

                <div class="clearfix">&nbsp;</div>

                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="email" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="email" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-primary" class="form-control">
                        </div>

                    </div>

                </form>

            </div>
            <div class="col-md-6 vh-100">
                coluna 02
            </div>
        </div>

    </div>


</body>

</html>