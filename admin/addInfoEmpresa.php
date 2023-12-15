<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: login.php');
    exit();
}
require_once '../db/connection.php';

$sqlSelect = "SELECT * FROM `company`";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    echo "Já existem informações registradas, edite ou apague as atuais.";
} else {
    if (isset($_POST["submit"])) {
        if (isset($_FILES['imgUpload'])) {
            $image = $_FILES['imgUpload'];

            if ($image['error']) {
                die("Falha ao enviar arquivo");
            }

            $path = "imagesUpload/";

            $imageName = $image['name'];

            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION)); // strtolower: tudo em minusculo 

            $pathImg = ($path . $imageName);

            if ($extension != 'jpg' && $extension != 'png') {
                die('Tipo de arquivo não aceito');
            } else {
                $imageCorrect = move_uploaded_file($image["tmp_name"], $path . $imageName);
                if ($imageCorrect) {

                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $mail = $_POST["mail"];
                    $address = $_POST["address"];
                    $insta = $_POST["insta"];
                    $face = $_POST["face"];
                    $whats = $_POST["whats"];

                    mysqli_query($conn, "INSERT INTO company(name, tel, mail, address, insta, face, whats, logo, logoName) VALUES('$name', '$tel', '$mail', '$address', '$insta', '$face', '$whats', '$pathImg', '$imageName')");

                    header("location: infoEmpresa.php");

                } else {
                    echo "<p>Falha ao enviar</p>";
                }
            }
            // var_dump($_FILES['imgUpload']);
            // echo $_FILES['imgUpload']['name'];     
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
        <link rel="stylesheet" href="novoProdutoStyle.css">
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
            echo $img ?>" height="100px" alt="Logo"></a>                <a href="../index.php"><button class="btn btn-outline-danger" type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="addInfoEmpresa.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="infoEmpresa.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="name">Empresa:</label>
                            <input type="text" name="name" id="name" placeholder="Nome da empresa" required>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="tel">Número para contato:</label>
                            <input type="text" name="tel" id="tel" placeholder="Contato da empresa">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="mail">Email:</label>
                            <input type="text" name="mail" id="mail" placeholder="Email de contato">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="address">Endereço:</label>
                            <input type="text" name="address" id="address" placeholder="Endereço da empresa">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="insta">Instagram:</label>
                            <input type="text" name="insta" id="insta" placeholder="Instagram">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="face">Facebook(link):</label>
                            <input type="text" name="face" id="face" placeholder="Facebook">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="whats">Whatsapp(link):</label>
                            <input type="text" name="whats" id="whats" placeholder="DDD + xxxxx-xxxx">
                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload" id="imgUpload" required hidden>
                                <a><button id="choose" onclick="upload()" style="width: 100%">Logo da empresa</button></a>
                            </div>
                        </div>
                    </div>
                    <script>
                        var productName = document.getElementById("productName");
                        var choose = document.getElementById("choose");
                        var imgUpload = document.getElementById("imgUpload");

                        function upload() {
                            imgUpload.click();
                        }

                        imgUpload.addEventListener("change", function () {
                            var file = this.files[0];
                            choose.innerHTML = file.name;
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