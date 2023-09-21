<?php
    require_once '../db/connection.php';

    if(isset($_POST["submit"]) ){
        if(isset($_FILES['imgUpload'])){
            $image = $_FILES['imgUpload'];

            if($image['error']){
                die("Falha ao enviar arquivo");
            }

            $path = "imagesUpload/";

            $imageName = $image['name'];
            
            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION)); // strtolower: tudo em minusculo 

            $pathImg = ($path . $imageName);

            if($extension != 'jpg' && $extension != 'png'){
                die('Tipo de arquivo não aceito');
            }else{
                $imageCorrect = move_uploaded_file($image["tmp_name"], $path . $imageName);
                if($imageCorrect){

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
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="../img/logo.png" alt="logo" width="160px">
            </div>
        </nav>
    </header><br>


    <section id="upload-section">
        <form action="novoProduto.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="productName" id="productName" placeholder="Nome do produto" required>
            <input type="text" name="productDetail1" id="productDetail1" placeholder="Combustível" required>
            <input type="text" name="productDetail2" id="productDetail2" placeholder="Elevação" required>
            <input type="text" name="productDetail3" id="productDetail3" placeholder="Capacidade de Carga" required>
            <input type="file" name="imgUpload" id="imgUpload" required hidden>
            <button id="choose" onclick="upload()">Escolher Imagem</button>
            <input type="submit" value="Salvar" name="submit">
    </section>
    
    <script>
        var productName = document.getElementById("productName");
        var choose = document.getElementById("choose");
        var imgUpload = document.getElementById("imgUpload");

        function upload() {
            imgUpload.click();
        }

        imgUpload.addEventListener("change", function() {
            var file = this.files[0];
            choose.innerHTML = file.name; 
        });
    </script>

</body>
</html>