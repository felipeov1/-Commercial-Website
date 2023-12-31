<?php
if (!empty($_GET['id'])) {

    include_once '../db/connection.php';

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM products WHERE product_id = $id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $id = $product_data['product_id'];
        $imgName = $product_data['product_image'];
        $productName = $product_data['product_name'];
        $productDetail1 = $product_data['product_detail1'];
        $productDetail2 = $product_data['product_detail2'];
        $productDetail3 = $product_data['product_detail3'];
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
        <link rel="stylesheet" href="editStyle.css">
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
                <form action="./saveEdit.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <button><a href="controleDeProdutos.php">Voltar</a></button>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="inputBox">
                            <label for="productName">Produto:</label>
                            <input id="productName" type="text" value="<?php echo $productName ?>" name="productName">
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDetail1">Tipo de combustível:</label>
                            <input type="text" name="productDetail1" value="<?php if ($product_data['product_detail1'] = !"")
                                echo $productDetail1 ?>" id="productDetail1">
                            </div>
                        </div>
                        <div class="inputGroup">
                            <div class="inputBox">
                                <label for="productDetail1">Elevacão:</label>
                                <input type="text" name="productDetail2" value="<?php echo $productDetail2 ?>"
                                id="productDetail2">
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDetail1">Capacidade de carga:</label>
                            <input type="text" name="productDetail3" value="<?php echo $productDetail3 ?>"
                                id="productDetail3">
                        </div>
                    </div>
                    <div class="imgBtn">
                        <div class="inputBox">
                            <input type="hidden" name="originalImgName"value="<?php echo $product_data['product_image'] ?>">
                            <input type="file" name="imgUpload" id="imgUpload" hidden>
                            <input type="button" id="choose" value="Alterar: <?php echo $imgName ?>" onclick="upload()">
                        </div>
                    </div><br>

                    <div class="updateBtn">
                        <input type="submit" value="Atualizar" name="update" id="update">
                    </div>
                </form>
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

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    </html>