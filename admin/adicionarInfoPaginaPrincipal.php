<?php
session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: login.php');
    exit();
}

require_once '../db/connection.php';

if (isset($_POST["submit"])) {
    $target_dir = "imagesUpload/"; 

    for ($i = 1; $i <= 5; $i++) {
        $image = $_FILES['imgUpload' . $i];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageError = $image['error'];
        $imageSize = $image['size'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if ($imageError) {
            die("Falha ao enviar arquivo: " . $imageError);
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageExtension, $allowedExtensions)) {
            die('Tipo de arquivo não aceito');
        }

        if ($imageSize > 10000000) { 
            die('Tamanho do arquivo excede o limite');
        }


        $newImageName = uniqid() . '.' . $imageExtension;

        $targetFilePath = $target_dir . $newImageName;
        if (!move_uploaded_file($imageTmpName, $targetFilePath)) {
            die('Falha ao mover o arquivo');
        }


        if ($i === 1) {
            $banner1 = $newImageName;
        } elseif ($i === 2) {
            $banner2 = $newImageName;
        } elseif ($i === 3 ) {
            $banner3 = $newImageName;
        }elseif($i === 4){
            $cardImg = $newImageName;
        }else{
            $missionImg = $newImageName;
            
        }
    }


    $bannerText = $_POST["bannerText"];
    $exploreSectionText = $_POST["exploreSectionText"];
    $ourMissionText = $_POST["ourMissionText"];
    $cardName = $_POST["cardName"];

    $sqlInsert = "INSERT INTO main_page(bannerText, exploreSectionText, ourMissionText, banner1, banner2, banner3, cardName, cardImg, missionImg) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param('sssssssss', $bannerText, $exploreSectionText, $ourMissionText, $banner1, $banner2, $banner3, $cardName, $cardImg, $missionImg);

    if ($stmt->execute()) {
        echo "Informações da empresa adicionadas com sucesso";
        header('location: editarPaginaPrincipal.php');
    } else {
        echo "Erro ao adicionar informações da empresa";
    }
}

$sqlLogo = "SELECT * FROM `company`";
$resultLogo = $conn->query($sqlLogo);
$dataLogo = mysqli_fetch_assoc($resultLogo);
?>

<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="adicionarInfoPaginaPrincipalStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Document</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="<?php $dataName = $dataLogo['logoName'];
                $path = "./imagesUpload/";
                $img = ($path . $dataName);
                echo $img ?>" height="100px" alt="Logo"></a> <a href="../index.php"><button class="btn btn-outline-danger"
                        type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="adicionarInfoPaginaPrincipal.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="editarPaginaPrincipal.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="exploreSectionText">Texto da sessão de exploração:</label>
                            <textarea name="exploreSectionText" id="exploreSectionText"
                                placeholder="Insira o texto da seção de exploração"></textarea>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="exploreSectionText">Título do card:</label>
                            <textarea name="cardName" id="cardName"
                                placeholder="Insira o título do card"></textarea>
                        </div>
                    </div>
                    <div id="dynamic-inputs">

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload1" id="imgUpload1"  hidden>
                                <a><button id="choose1" onclick="upload1()" return=false>Banner 1</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload2" id="imgUpload2"  hidden>
                                <a><button id="choose2" onclick="upload2()" return=false>Banner 2</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload3" id="imgUpload3"  hidden>
                                <a><button id="choose3" onclick="upload3()" return=false>Banner 3</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload5" id="imgUpload5" required hidden>
                                <a><button id="choose5" onclick="upload5()" return=false>Imagem da "Nossa Missão"</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload4" id="imgUpload4" required hidden>
                                <a><button id="choose4" onclick="upload4()" return=false>Imagem do card</button></a>
                            </div>
                        </div>
                    </div>
                    <script>
                        var imgUpload1 = document.getElementById("imgUpload1");
                        var choose1 = document.getElementById("choose1");

                        function upload1() {
                            imgUpload1.click();
                        }

                        imgUpload1.addEventListener("change", function () {
                            var file = this.files[0];
                            choose1.innerHTML = file.name;
                        });

                        var imgUpload2 = document.getElementById("imgUpload2");
                        var choose2 = document.getElementById("choose2");

                        function upload2() {
                            imgUpload2.click();
                        }

                        imgUpload2.addEventListener("change", function () {
                            var file = this.files[0];
                            choose2.innerHTML = file.name;
                        });

                        var imgUpload3 = document.getElementById("imgUpload3");
                        var choose3 = document.getElementById("choose3");

                        function upload3() {
                            imgUpload3.click();
                        }

                        imgUpload3.addEventListener("change", function () {
                            var file = this.files[0];
                            choose3.innerHTML = file.name;
                        });

                        var imgUpload3 = document.getElementById("imgUpload3");
                        var choose3 = document.getElementById("choose3");

                        function upload4() {
                            imgUpload4.click();
                        }

                        imgUpload4.addEventListener("change", function () {
                            var file = this.files[0];
                            choose4.innerHTML = file.name;
                        });

                        var imgUpload5 = document.getElementById("imgUpload5");
                        var choose5 = document.getElementById("choose5");

                        function upload5() {
                            imgUpload5.click();
                        }

                        imgUpload5.addEventListener("change", function () {
                            var file = this.files[0];
                            choose5.innerHTML = file.name;
                        });
                    </script>
                    <div class="updateBtn">
                        <input id="update" type="submit" value="Salvar" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    </html>