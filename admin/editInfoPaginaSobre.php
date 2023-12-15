<?php
if (!empty($_GET['id'])) {

    include_once '../db/connection.php';

    $id = $_GET['id'];


    $sqlSelect = "SELECT * FROM about_page WHERE id = $id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $id = $product_data['id'];
        $title = $product_data['title'];
        $smallText = $product_data['smallText'];
        $imgBanner = $product_data['img'];
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
                echo $img ?>" height="100px" alt="Logo"></a> <a href="../index.php"><button
                        class="btn btn-outline-danger" type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="saveEditInfoPaginaSobre.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="./editarPaginaSobre.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <div class="inputBox">
                            <label for="title">Título:</label>
                            <textarea name="title" id="title" cols="30" rows="10"><?php echo $title ?></textarea>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="text">Texto:</label>
                            <textarea name="smallText" id="smallText" cols="30"
                                rows="10"><?php echo $smallText ?></textarea>
                        </div>
                    </div>
                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                            <input type="hidden" name="originalImgName"value="<?php echo $product_data['img'] ?>">
                                <input type="file" name="imgUpload" id="imgUpload" hidden>
                                <input type="button" id="choose" value="Alterar: <?php echo $imgBanner ?>"
                                    onclick="upload()">
                            </div>
                        </div>
                    </div>
                    <div class="updateBtn">
                    <input type="submit" value="Atualizar" name="update" id="update">
                    </div>
                </form>
            </div>
        </div>

        <script>
            var title = document.getElementById("title");
            var choose = document.getElementById("choose");
            var imgUpload = document.getElementById("imgUpload");
            var imgBanner = document.getElementById("imgBanner");

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