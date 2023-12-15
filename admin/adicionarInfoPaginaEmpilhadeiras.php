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
    if (isset($_FILES['imgUpload'])) {
        $image = $_FILES['imgUpload'];

        if ($image['error']) {
            die("Falha ao enviar arquivo");
        }

        $path = "../imagesUpload/";

        $imageName = $image['name'];

        $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION)); // strtolower: tudo em minusculo 

        $pathImg = ($path . $imageName);

        if ($extension != 'jpg' && $extension != 'png') {
            die('Tipo de arquivo não aceito');
        } else {
            $imageCorrect = move_uploaded_file($image["tmp_name"], $path . $imageName);

            if ($imageCorrect) {
                $bannerText = $_POST["bannerText"];
                $exploreSectionText = $_POST["exploreSectionText"];
                $ourMissionText = $_POST["ourMissionText"];

                $banner1 = $_FILES['imgUpload1']['name'];
                $banner2 = $_FILES['imgUpload2']['name'];
                $banner3 = $_FILES['imgUpload3']['name'];

                $sqlInsert = "INSERT INTO forklift_page(imgText1, img1, imgText2, img2, imgText3, img3) VALUES(?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sqlInsert);
                $stmt->bind_param('sssssssss', $bannerText, $exploreSectionText, $ourMissionText, $banner1, $banner2, $banner3);

                if ($stmt->execute()) {
                    echo "Informações da empresa adicionadas com sucesso";
                    header('location: editarPaginaPrincipal.php');
                } else {
                    echo "Erro ao adicionar informações da empresa";
                }
            } else {
                echo "<p>Falha ao enviar arquivo: " . $image['error'] . "</p>";
            }
        }
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
                            <a href="editarPaginaEmpilhadeiras.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="bannerText">Texto da imagem 1:</label>
                            <textarea name="bannerText" id="bannerText"
                                placeholder="Insira o texto da imagem 1"></textarea>
                        </div>
                    </div>

                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="exploreSectionText">Texto da imagem 2:</label>
                            <textarea name="exploreSectionText" id="exploreSectionText"
                                placeholder="Insira o texto da imagem 2"></textarea>
                        </div>
                    </div>

                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="ourMissionText">Texto da imagem 3:</label>
                            <textarea name="ourMissionText" id="ourMissionText"
                                placeholder="Insira o texto da imagem 3"></textarea>
                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload1" id="imgUpload1" required hidden>
                                <a><button id="choose1" onclick="upload1()">Imagem 1</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload2" id="imgUpload2" required hidden>
                                <a><button id="choose2" onclick="upload2()">Imagem 2</button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload3" id="imgUpload3" required hidden>
                                <a><button id="choose3" onclick="upload3()">Imagem 3</button></a>
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