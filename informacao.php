<?php
require_once './db/connection.php';

if (isset($_GET['id'])) {


    $idReference = $_GET['id'];
    print_r($idReference);


    $sql = "SELECT products.*, productsinformations.nameInfo, productsinformations.info, productsinformations.product_description, 
    productsinformations.product_smallinfo   
    FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";

    $result = $conn->query($sql);


} else {
    echo "ID do produto não fornecido";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="informacaoStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Empresa</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" height="70px" alt="Imagem Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    <a class="nav-link" href="empilhadeiras.php">Empilhadeiras</a>
                    <a class="nav-link" href="contato.php">Contato</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row d-flex align-items-center" style="padding-bottom: 100px;">
        <div class="colImg col-md-6" style="padding: 0;">
            <div class="imageSide ">
                <div class="view">
                    <div id="carouselExample" class="carousel carousel-dark slide">
                        <img id="fullImage" src="img/FD45T/2-1b.jpg" alt="...">
                        <div class="carousel-inner" id="carouselCard">
                            <div class="carousel-item active">
                                <div class="carouselCard card-wrapper container-sm d-flex  justify-content">
                                    <div class="card">
                                        <img src="img/FD45T/11b.jpg" class="card-img-top" alt="..."
                                            onclick="change(this)">
                                    </div>
                                    <div class="card">
                                        <img src="img/FD45T/12b.jpg" class="card-img-top" alt="..."
                                            onclick="change(this)">
                                    </div>
                                    <div class="card">
                                        <img src="img/FD45T/13b.jpg" class="card-img-top" alt="..."
                                            onclick="change(this)">
                                    </div>
                                    <div class="card">
                                        <img src="img/FD45T/14b.jpg" class="card-img-top" alt="..."
                                            onclick="change(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <script>
            function change(smallImg) {

                let fullImage = document.getElementById("fullImage");
                fullImage.src = smallImg.src;
            }
        </script>

        <?php

        $sql_info = "SELECT products.*, productsinformations.nameInfo, productsinformations.info, productsinformations.product_description, 
            productsinformations.product_smallinfo   
            FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";

        $result_info = $conn->query($sql_info);

        if ($result_info->num_rows > 0) {
            $product_data = $result->fetch_assoc();
            echo "<div class='col-md-6' style='padding: 0;'>";
            echo "<div class='informationSide'>";
            echo "<div class='textInformation'>";
            echo "<h1>" . $product_data['product_name'] . "</h1><br>";
            echo "<p class='description'>" . $product_data['product_description'] . "</p><br>";
            while ($product_data = $result_info->fetch_assoc()){
                if( $product_data['product_smallinfo'] != ""){
                    echo "<p><i class='bi bi-chevron-right' style='color: #fbb400;'></i>" .
                    $product_data['product_smallinfo'] . "</p>";
                }
            }
        } else{
            echo "<div class='col-md-6' style='padding: 0;'>";
            echo "<div class='informationSide'>";
            echo "<div class='textInformation'>";
            echo "<h1>Nome não cadastrado</h1><br>";
            echo "<p class='description'>Descrição não cadastrada</p><br>";
            echo "<p><i class='bi bi-chevron-right' style='color: #fbb400;'>Características gerais não cadastradas</i></p>";
        }

        echo "<a href='./comprar-empilhadeira.php'><button type='submit'>Adquirir</button></a>";
        echo "</div>";
        echo "<div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        ?>
    </div>
    <div class="tableContainer container">
        <table class='table table-striped border'>
            <thead>
                <th colspan="3" class="text-center" style="background-color: #fbb400;">Especificações</th>
            </thead>
            <tbody>
                <?php
                $sql_info = "SELECT products.*, productsinformations.nameInfo, productsinformations.info, productsinformations.product_description, 
                    productsinformations.product_smallinfo   
                    FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";

                $result_info = $conn->query($sql_info);
                if ($result_info->num_rows > 0) {
                    while ($product_data = $result_info->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $product_data['nameInfo'] . "</td>";
                        echo "<td>" . $product_data['info'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td>Nome da especificação não informada</td>";
                    echo "<td>Características da especificação não informada</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4"><img src="img/logo.png" height="150px" alt="Imagem Logo"></h5>
                    </div>

                    <div class="footerNav col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Navegação
                        </h5>
                        <hr class="mb-4">
                        <p>
                            <a href="index.php">Início</a>
                        </p>
                        <p>
                            <a href="empilhadeiras.php">Empilhadeiras</a>
                        </p>
                        <p>
                            <a href="contato.php">Contato</a>
                        </p>
                    </div>
                    <div class="ContactBar col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Contato
                        </h5>
                        <hr class="mb-4">
                        <p>
                            <a href="" class="bi bi-geo-alt-fill"> Seu endereço</a><br>
                        </p>
                        <p>
                            <a href="" class="bi bi-telephone-fill"> (xx) xxxx-xxxx</a><br>
                        </p>
                        <p>
                        </p>
                        <a href="" class="bi bi-envelope-fill"> seuemail@contato.com</a>
                        </p><br><br>
                    </div>
                    <hr class="mb-4">
                    <div class=" mediaIcon text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-whatsapp"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

</html>