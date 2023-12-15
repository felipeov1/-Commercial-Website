<?php
require_once './db/connection.php';



$sql = "SELECT * FROM `company`";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sobreStyle.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-align-v.css' rel='stylesheet'>
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

    <?php
    $sqlSelect = "SELECT * FROM `about_page`";
    $resultImg = $conn->query($sqlSelect); 


    while($resultSelect =  mysqli_fetch_assoc($resultImg)){

        echo "<div class='containerConten' container-fluid'>";
        echo "<div class='image-text' style='padding-right: 50px;'>";
        $img = "admin/imagesUpload/" . $resultSelect['pathImg'];
        echo "<img src='$img' alt='Imagem 1'>";
        echo "<div class='text'>";
        echo "<h1>" . $resultSelect['title'] . "</h1>";
        echo "<p>" . $resultSelect['smallText'] . "</p><br>";
        echo "<a href='empilhadeiras.php' class='btnProducts'>Ver Produtos</a>";
        echo "</div>";
        echo "</div>";
    
        echo "<div class='image-text' id='mobile' style='padding-left: 50px;'>";
        echo "<img src='img/" . $resultSelect['img'] . "alt='Imagem 2' class='fade-in'>";
        echo "<div class='text'>";
        echo "<h1 class='fade-in'>" . $resultSelect['title'] . "</h1>";
        echo "<p class='fade-in'>" . $resultSelect['text'] . "</p>";
        echo "<a href='empilhadeiras.php' class='btnProducts fade-in'>Ver Produtos</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    ?>
    <script>
        window.addEventListener('scroll', () => {
            const images = document.querySelectorAll('.fade-in');
            images.forEach(image => {
                const position = image.getBoundingClientRect().top;
                const screenHeight = window.innerHeight;

                if (position < screenHeight) {
                    image.classList.add('show');
                }
            });
        });
    </script>
    
    <footer class="text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4"><img src="<?php $dataName = $data['logoName'];
                        $path = "./admin/imagesUpload/";
                        $img = ($path . $dataName);
                        echo $img ?>" height="150px" alt="Imagem Logo"></h5>
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