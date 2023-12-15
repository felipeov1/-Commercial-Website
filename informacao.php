<?php
require_once './db/connection.php';

if (isset($_GET['id'])) {

    $idReference = $_GET['id'];

    $sql = "SELECT products.*, productsinformations.* FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference 
    WHERE productsinformations.id_reference = $idReference";

    $result = $conn->query($sql);

    $sql = "SELECT * FROM `company`";
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);

    $sqlLogo = "SELECT * FROM `company`";
    $resultLogo = $conn->query($sqlLogo);
    $dataLogo = mysqli_fetch_assoc($resultLogo);

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
            <a class="navbar-brand" href="index.php"><img src="<?php $dataName = $data['logoName'];
            $path = "./admin/imagesUpload/";
            $img = ($path . $dataName);
            echo $img ?>" height="100px" alt="Logo"></a> <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    <a class="nav-link" href="empilhadeiras.php">Empilhadeiras</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row d-flex align-items-center" style="padding-bottom: 100px;">
        <div class="colImg col-md-6" style="padding: 0;">
            <div class="imageSide ">
                <div class="view">
                    <?php
                    $sql_info = "SELECT products.*, productsinformations.* FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";

                    $result = $conn->query($sql_info);

                    while ($products_data = mysqli_fetch_assoc($result)) {
                        $img = $products_data['product_imgName'];
                        $path = "./admin/imagesUpload/";
                        $pathImg = ($path . $img);
                        echo "<img id='fullImage' src='$pathImg'>";
                    }

                    ?>
                </div>
            </div>
        </div>



        <?php

        $sql_info = "SELECT products.*, productsinformations.* FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";


        $result_info = $conn->query($sql_info);

        if ($result_info->num_rows > 0) {
            $product_data = $result_info->fetch_assoc();
            echo "<div class='col-md-6' style='padding: 0;'>";
            echo "<div class='informationSide'>";
            echo "<div class='textInformation'>";
            echo "<h1>" . $product_data['product_name'] . "</h1><br>";
            echo "<p class='description'>" . $product_data['product_description'] . "</p><br>";

            for ($i = 0; $i <= 5; $i++) {
                $smallInfo = 'product_smallinfo' . $i;

                if (!empty($product_data[$smallInfo])) {
                    echo "<p><i class='bi bi-chevron-right' style='color: #fbb400;'></i>" .
                        $product_data[$smallInfo] . "</p>";
                }
            }


        } else {
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
                $sql_info = "SELECT products.*, productsinformations.* FROM `products` JOIN `productsinformations` ON products.product_id = productsinformations.id_reference WHERE productsinformations.id_reference = $idReference";


                $result_info = $conn->query($sql_info);
                if ($result_info->num_rows > 0) {
                    ($product_data = $result_info->fetch_assoc());
                    echo "<tr>";
                    echo "<td>" . $product_data['nameInfo1'] . "</td>";
                    echo "<td>" . $product_data['info1'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $product_data['nameInfo2'] . "</td>";
                    echo "<td>" . $product_data['info2'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $product_data['nameInfo3'] . "</td>";
                    echo "<td>" . $product_data['info3'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $product_data['nameInfo4'] . "</td>";
                    echo "<td>" . $product_data['info4'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $product_data['nameInfo5'] . "</td>";
                    echo "<td>" . $product_data['info5'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
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
                    <h5 class="mb-4"><img src="<?php $dataName = $dataLogo['logoName'];
                    $path = "./admin/imagesUpload/";
                    $img = ($path . $dataName);
                    echo $img ?>" height="150px" alt="Imagem Logo"></h5>                      </div>

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