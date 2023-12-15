<?php
require_once './db/connection.php';




$sql = "SELECT * FROM `company`";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);

$sqlLogo = "SELECT * FROM `company`";
$resultLogo = $conn->query($sqlLogo);
$dataLogo = mysqli_fetch_assoc($resultLogo);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compraStyle.css">
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


    <div class="container frmBx">
        <form class="frmMain" action="https://formsubmit.co/ofelipe439@gmail.com" method="POST">
            <input type="hidden" name="_captcha" value="false">
            <div class="mb-3">
                <label class="form-label">Nome Completo:</label>
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
                            <input type="tel" name="tel" class="form-control"
                                pattern="\([0-9]{2}\)[9]{1}[0-9]{4}-[0-9]{4}" placeholder="(xx)9xxxx-xxxx" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Menssagem:</label>
                <textarea type="textarea" name="textarea" class="form-control" rows="8"
                    placeholder="Digite o que você precisa..."></textarea required>
            </div>
            <input type="hidden" name="_next" value="http://localhost/felipe/ecommerce/SiteComercial/enviado.php">
            <div class="btn d-grid gap-2">
                <button class="btn btn-dark" type="submit">Enviar Mensagem</button>
            </div>
            <p>Entraremos em contato com você o mais rápido possível.</p>
        </form> 
    </div>


    <footer class="text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="mb-4"><img src="<?php $dataName = $dataLogo['logoName'];
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
                            <a href="index.html">Início</a>
                        </p>
                        <p>
                            <a href="empilhadeiras.html">Empilhadeiras</a>
                        </p>
                        <p>
                            <a href="contato.html">Contato</a>
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