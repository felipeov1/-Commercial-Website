<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: login.php');
    exit();
}
require_once '../db/connection.php';

$sqlSelect = "SELECT * FROM `about_page`";
$result = $conn->query($sqlSelect);


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

               


                mysqli_query($conn, "INSERT INTO forklift_page (img, pathImg) VALUES('$pathImg', '$imageName')");
                header("location: editarPaginaEmpilhadeiras.php");

            } else {
                echo "<p>Falha ao enviar</p>";
            }
        }
        // var_dump($_FILES['imgUpload']);
        // echo $_FILES['imgUpload']['name'];     
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
                echo $img ?>" height="100px" alt="Logo"></a> <a href="../index.php"><button
                        class="btn btn-outline-danger" type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="adicionarInfoPaginaEmpilhadeira.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="editarPaginaEmpilhadeiras.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload" id="imgUpload" required hidden>
                                <a><button id="choose" style="width: 100%" onclick="upload()">Imagem</button></a>
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
                        <input id="update" type="submit" value="Salvar" name="submit" style="width: 300px">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    </html>