<?php
session_start();

require_once '../db/connection.php';

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

                $productName = $_POST["productName"];
                $productDetail1 = $_POST["productDetail1"];
                $productDetail2 = $_POST["productDetail2"];
                $productDetail3 = $_POST["productDetail3"];

                mysqli_query($conn, "INSERT INTO products(product_name, product_image, product_imgName, product_detail1, product_detail2, product_detail3) VALUES('$productName', '$pathImg', '$imageName', '$productDetail1', '$productDetail2', '$productDetail3')");

                echo "<p>Arquivo enviado com sucesso! Para acessa-lo: <a target=\"_blank\" href=\"images/$imageName\"><\a></p>";
            } else {
                echo "<p>Falha ao enviar</p>";
            }
        }
        // var_dump($_FILES['imgUpload']);
        // echo $_FILES['imgUpload']['name'];     
    }
}
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
                <a class="navbar-brand" href="index.php"><img src="../img/logo.png" height="70px" alt="Imagem Logo"></a>
                <a href="../index.php"><button class="btn btn-outline-danger" type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="novoProduto.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="controleDeProdutos.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productName">Produto:</label>
                            <input type="text" name="productName" id="productName" placeholder="Nome do produto"
                                required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDetail1">Tipo de combustível:</label>
                            <input type="text" name="productDetail1" id="productDetail1" placeholder="Combustível"
                                required>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDetail1">Elevacão:</label>
                            <input type="text" name="productDetail2" id="productDetail2" placeholder="Elevação"
                                required>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDetail1">Capacidade de carga:</label>
                            <input type="text" name="productDetail3" id="productDetail3"
                                placeholder="Capacidade de Carga" required>
                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload" id="imgUpload" required hidden>
                                <a><button id="choose" onclick="upload()">Escolher Imagem</button></a>
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