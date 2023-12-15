<?php
require_once('db/connection.php');


$sqlLogo = "SELECT * FROM `company`";
$resultLogo = $conn->query($sqlLogo);
$dataLogo = mysqli_fetch_assoc($resultLogo);



$sqlSelect = "SELECT * FROM main_page";
$result = $conn->query($sqlSelect);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="<?php $dataName = $dataLogo['logoName'];
            $path = "./admin/imagesUpload/";
            $img = ($path . $dataName);
            echo $img ?>" height="100px" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    $sqlSelect = "SELECT * FROM main_page";
    $data = $conn->query($sqlSelect);
    $banner = mysqli_fetch_assoc($result)
        ?>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo "admin/" . $banner['banner1'] ?>" class="d-block w-100"
                    style="width: max-width !important; height: 500px" alt="Banner">
            </div>
            <div class="carousel-item">
                <img src="<?php echo "admin/" . $banner['banner2'] ?>" class="d-block w-100"
                    style="width: max-width !important; height: 500px" alt="Banner">
            </div>
            <div class="carousel-item">
                <img src="<?php echo "admin/" . $banner['banner3'] ?>" class="d-block w-100"
                    style="width: max-width !important; height: 500px" alt="Banner">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="information" style="text-align: center">
        <h1>
            <?php $sqlSelect = "SELECT * FROM main_page";
            $result = $conn->query($sqlSelect);
            if ($data = mysqli_fetch_assoc($result)) {
                echo $data['exploreSectionText'];
            } else {
                echo "";
            }
            ?>
        </h1>
    </div>

    <div class='mainProducts'>
        <?php

        $sqlSelect = "SELECT * FROM main_page";
        $info = $conn->query($sqlSelect);

        while ($data = mysqli_fetch_assoc($info)) {
            echo "<div class='card'>";
            echo "<div>";
            $img = "./admin/" . $data['banner1'];
            echo "<img src='$img' alt='Imagem Empilhadeira'>";
            echo "</div>";
            echo "<div class='dataCard'>";
            echo "<h1>" . $data['cardName'] . "</h1>";
            echo "</div>";
            echo "<div class='btnData'>";
            echo "<a href='sobre.php' id='btnMoreInformation'>Sobre</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="btnProductsPage">
        <a href="empilhadeiras.php"><button id="btnMoreProdutcs">Ver mais</button></a>
    </div>



    <div class="frmTitle container-fluid" id="sectionContact">
        <h1>Entre em Contato</h1>
        <p>Possuímos divesas formas de contato para atendimento.</p>
    </div>
    <div class="container container-fluid ">
        <div class="row">
            <div class="contactColum col-sm">
                <h1>Formulário de Contato</h1>
                <p>Para entrar em contato conosco por email, preencha o formulário abaixo e clique em Enviar Mensagem.
                </p>
                <hr>
                <form class="frmMain" action="enviarEmail.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nome:</label>
                        <input type="name" name="name" class="form-control" placeholder="seu nome" required>
                    </div>
                    <div class="mb-3">
                        <div class="conatinerContact container">
                            <div class="row">
                                <div class="col gx-2">
                                    <label class="form-label">Email:</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="nome@exemplo.com" required>
                                </div>
                                <div class="celular col  gx-2">
                                    <label class="form-label">Celular:</label>
                                    <input type="tel" name="tel" class="form-control" placeholder="DDD + número"
                                        id="telefoneInput" required>
                                </div>

                                <script>
                                    function formatarTelefone() {
                                        let telefoneInput = document.getElementById('telefoneInput');
                                        let valor = telefoneInput.value;

                                        valor = valor.replace(/\D/g, '');

                                        if (valor.length === 11) {
                                            valor = `(${valor.substr(0, 2)}) ${valor.substr(2, 1)}${valor.substr(3, 4)}-${valor.substr(7)}`;
                                        }
                                        telefoneInput.value = valor;
                                    }

                                    let telefoneInput = document.getElementById('telefoneInput');
                                    telefoneInput.addEventListener('input', formatarTelefone);
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
                        <textarea type="textarea" name="textarea" class="form-control" rows="8"></textarea required>
                    </div>
                    <div class="btn d-grid gap-2">
                        <button class="btn btn-dark" name="enviar" type="submit">Enviar Mensagem</button>
                    </div>
                    <p>Entraremos em contato com você o mais rápido possível</p>
                </form>  
            </div>
            
            <div class="information mapsColum col-sm" style="margin: 0px">
                <div class="container text-center">
                    <div class="contactInformation row" style="margin: 50px 5px 15px 5px">
                    <?php
                    $sql = "SELECT * FROM `company`";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_assoc($result);
                    while ($data) {
                        echo "<div class='whatsapp col-4'>";
                        echo "<h1>Telefone:</h1>";
                        echo "<h6>" . $data['tel'] . "</h6>";
                        echo "</div>";
                        echo "<div class='email col-4'>";
                        echo "<h1>E-mail:</h1>";
                        echo "<h6>" . $data['mail'] . "</h6>";
                        echo "</div>";
                        echo "<div class='adresse col-4'>";
                        echo "<h1>Endereço:</h1>";
                        echo "<h6>" . $data['address'] . "</h6>";
                        echo "</div>";

                        $data = mysqli_fetch_assoc($result);
                    }
                    ?>
                    </div>
                </div>
                <div class="mediaIcon" style="display: flex">
                    <?php
                    $sql = "SELECT * FROM `company`";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_assoc($result);
                    while ($data) {
                        echo "<ul class='list-unstyled list-inline'>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://www.facebook.com/" . $data['face'] . "' target='_blank'><i class='bi bi-facebook text-black'></i></a>";
                        echo "</li>";
                        echo "</ul>";

                        echo "<ul class='list-unstyled list-inline'>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://wa.me/" . $data['whats'] . "' target='_blank'><i class='bi bi-whatsapp text-black'></i></a>";
                        echo "</li>";
                        echo "</ul>";

                        echo "<ul class='list-unstyled list-inline'>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://www.instagram.com/" . $data['insta'] . "' target='_blank'><i class='bi bi-instagram text-black'></i></a>";
                        echo "</li>";
                        echo "</ul>";

                        $data = mysqli_fetch_assoc($result);

                    }
                    ?>
                    
                </div>
                <div id="map">
                    <script>
                        var map = L.map('map').setView([-23.3122, -51.159656], 13);
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
                        L.marker([-23.3122, -51.159656]).addTo(map)
                            .bindPopup('Sua empresa.<br>')
                            .openPopup();
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 50px; padding: 0px">
    <?php
    $sqlSelect = "SELECT * FROM main_page";
    $result = $conn->query($sqlSelect);
    if ($data = mysqli_fetch_assoc($result)) {
        $img = "./admin/" . $data['missionImg'];
        echo "<img src='$img' class='img-fluid' alt='banner' style='width: 2000px !important; height: 400px;'>";
    } else {
        echo "";
    }
    ?>
    </div>

    <footer class="text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="mb-4"><img src="<?php $dataName = $dataLogo['logoName'];
                    $path = "./admin/imagesUpload/";
                    $img = ($path . $dataName);
                    echo $img ?>" height="150px" alt="Imagem Logo"></h5></div>

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
                        <?php
                        $sql = "SELECT * FROM `company`";
                        $result = $conn->query($sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo '<p><a href="" class="bi bi-geo-alt-fill"></a><a style="margin-left: 10px">' . $data['address'] . '</a></p>';
                            echo '<p>';
                            echo '<a href="" class="bi bi-telephone-fill"></a><a style="margin-left: 10px">' . $data['tel'] . '</a>';
                            echo '</p>';
                            echo '<p>';
                            echo '<a href="" class="bi bi-envelope-fill"></a><a style="margin-left: 10px">' . $data['mail'] . '</a>';
                            echo '</p>';
                            echo '<br><br>';
                        }
                        ?>
                    </div>
                    <hr class="mb-4">
                    <?php
                    $sql = "SELECT * FROM `company`";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_assoc($result);
                    while ($data) {
                        echo "<div class='mediaIcon text-center' style='text-align: center'>";
                        echo "<ul class='list-unstyled list-inline'>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://www.facebook.com/" . $data['face'] . "' target='_blank' class='text-white'><i class='bi bi-facebook'></i></a>";
                        echo "</li>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://wa.me/" . $data['whats'] . "' target='_blank' class='text-white'><i class='bi bi-whatsapp'></i></a>";
                        echo "</li>";
                        echo "<li class='list-inline-item'>";
                        echo "<a href='https://www.instagram.com/" . $data['insta'] . "' target='_blank' class='text-white'><i class='bi bi-instagram'></i></a>";
                        echo "</li>";
                        echo "</ul>";
                        echo "</div>";
                        $data = mysqli_fetch_assoc($result);
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>