<?php
if (!empty($_GET['id'])) {

    include_once '../db/connection.php';

    $id = $_GET['id'];


    $sqlSelect = "SELECT * FROM main_page WHERE id = $id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $id = $product_data['id'];
        $bannerText = $product_data['bannerText'];
        $banner1 = $product_data['banner1'];
        $banner2 = $product_data['banner2'];
        $banner3 = $product_data['banner3'];
        $banner4 = $product_data['cardImg'];
        $banner5 = $product_data['missionImg'];
        $exploreSectionText = $product_data['exploreSectionText'];
        $cardName = $product_data['cardName'];
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
                echo $img ?>" height="100px" alt="Logo"></a> <a href="../index.php"><button
                        class="btn btn-outline-danger" type="submit">Sair</button></a>
            </div>
        </nav>

        <div class="container">
            <div class="form">
                <form action="saveEditInfoPaginaPrincipal.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="editarPaginaPrincipal.php">Voltar</a>
                        </div>
                        <div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="exploreSectionText">Texto da sessão de exploração:</label>
                            <textarea name="exploreSectionText"
                                id="exploreSectionText"><?php echo $exploreSectionText ?></textarea>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="exploreSectionText">Título do card:</label>
                            <textarea name="cardName" id="cardName"><?php echo $cardName ?></textarea>
                        </div>
                    </div>

                    <div id="dynamic-inputs">
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="hidden" name="originalImgName1"
                                    value="<?php echo $product_data['banner1'] ?>">
                                <input type="file" name="imgUpload1" id="imgUpload1" hidden>
                                <a><button id="choose1" onclick="upload1(event)">
                                        <?php echo $banner1 ?>
                                    </button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="hidden" name="originalImgName2"
                                    value="<?php echo $product_data['banner2'] ?>">

                                <input type="file" name="imgUpload2" id="imgUpload2" hidden>
                                <a><button id="choose2" onclick="upload2(event)">
                                        <?php echo $banner2 ?>
                                    </button></a>
                            </div>
                        </div>

                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="hidden" name="originalImgName3"
                                    value="<?php echo $product_data['banner3'] ?>">

                                <input type="file" name="imgUpload3" id="imgUpload3" hidden>
                                <a><button id="choose3" onclick="upload3(event)">
                                        <?php echo $banner3 ?>
                                    </button></a>
                            </div>
                        </div>
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="hidden" name="originalImgName4" value="<?php echo $product_data['cardImg'] ?>">
                                <input type="file" name="imgUpload4" id="imgUpload4" hidden>
                                <a><button id="choose4" onclick="upload4(event)">
                                        <?php echo $banner4 ?>
                                    </button></a>
                            </div>
                        </div>
                        <div class="imgBtn">
                            <div class="inputBox">
                                <input type="hidden" name="originalImgName5"
                                    value="<?php echo $product_data['missionImg'] ?>">

                                <input type="file" name="imgUpload5" id="imgUpload5" hidden>
                                <a><button id="choose5" onclick="upload5(event)">
                                        <?php echo $banner5 ?>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <script>
                        var imgUpload1 = document.getElementById("imgUpload1");
                        var choose1 = document.getElementById("choose1");

                        function upload1(event) {
                            event.preventDefault();

                            imgUpload1.click();
                        }

                        imgUpload1.addEventListener("change", function () {
                            var file = this.files[0];
                            choose1.innerHTML = file.name;
                        });

                        var imgUpload2 = document.getElementById("imgUpload2");
                        var choose2 = document.getElementById("choose2");

                        function upload2(event) {
                            event.preventDefault();

                            imgUpload2.click();
                        }

                        imgUpload2.addEventListener("change", function () {
                            var file = this.files[0];
                            choose2.innerHTML = file.name;
                        });

                        var imgUpload3 = document.getElementById("imgUpload3");
                        var choose3 = document.getElementById("choose3");

                        function upload3(event) {
                            event.preventDefault();
                            imgUpload3.click();
                        }

                        imgUpload3.addEventListener("change", function () {
                            var file = this.files[0];
                            choose3.innerHTML = file.name;
                        });

                        var imgUpload4 = document.getElementById("imgUpload4");
                        var choose4 = document.getElementById("choose4");

                        function upload4(event) {
                            event.preventDefault();
                            imgUpload4.click();
                        }

                        imgUpload4.addEventListener("change", function () {
                            var file = this.files[0];
                            choose4.innerHTML = file.name;
                        });

                        var imgUpload5 = document.getElementById("imgUpload5");
                        var choose5 = document.getElementById("choose5");

                        function upload5(event) {
                            event.preventDefault();
                            imgUpload5.click();
                        }

                        imgUpload5.addEventListener("change", function () {
                            var file = this.files[0];
                            choose5.innerHTML = file.name;
                        });
                    </script>
                    <div class="updateBtn">
                    <input type="submit" value="Atualizar" name="update" id="update">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    </html>