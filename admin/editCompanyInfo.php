<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: login.php');
    exit();
}

if (!empty($_GET['id'])) {

    include_once '../db/connection.php';

    $id = $_GET['id'];


    $sqlSelect = "SELECT * FROM company WHERE id = $id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $id = $product_data['id'];
        $img = $product_data['logo'];
        $name = $product_data['name'];
        $tel = $product_data['tel'];
        $mail = $product_data['mail'];
        $address = $product_data['address'];
        $whats = $product_data['whats'];
        $face = $product_data['face'];
        $insta = $product_data['insta'];
    } else {
        echo "Produto não encontrado";
    }
} else {
    echo "ID do produto não fornecido";
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
                echo $img ?>" height="100px" alt="Logo"></a> <a href="../index.php"><button class="btn btn-outline-danger"
                        type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="saveInfoCompany.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="infoEmpresa.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="name">Empresa:</label>
                            <input type="text" name="name" id="name" value="<?php echo $name ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="tel">Número para contato:</label>
                            <input type="text" name="tel" id="tel" value="<?php echo $tel ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="mail">Email:</label>
                            <input type="text" name="mail" id="mail" value="<?php echo $mail ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="address">Endereço:</label>
                            <input type="text" name="address" id="address" value="<?php echo $address ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="insta">Instagram:</label>
                            <input type="text" name="insta" id="insta" value="<?php echo $insta ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="face">Facebook(link):</label>
                            <input type="text" name="face" id="face" value="<?php echo $face ?>">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="whats">Whatsapp(link):</label>
                            <input type="text" name="whats" id="whats" value="<?php echo $whats ?>">
                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="file" name="imgUpload" id="imgUpload" hidden>
                                <input type="button" id="choose" onclick="upload()"
                                    value="<?php echo "Alterar: " . $dataName ?>">
                            </div>
                        </div>
                    </div>
                    <script>
                        var productName = document.getElementById("productName");
                        var choose = document.getElementById("choose");
                        var imgUpload = document.getElementById("imgUpload");
                        var imgName = document.getElementById("imgName");

                        function upload() {
                            imgUpload.click();
                        }

                        imgUpload.addEventListener("change", function () {
                            var file = this.files[0];
                            choose.innerHTML = "Alterar: " + file.name;
                            choose.value = "Alterar: " + file.name;
                        });


                    </script>
                    <div class="updateBtn">
                        <input id="update" type="submit" value="Salvar" name="update">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    </html>