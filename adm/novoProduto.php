<?php
    require_once '../db/connection.php';

    if(isset($_POST["submit"])){
        $productName = $_POST["productName"];
        $productDescription = $_POST["productDescription"];

        $sql = "INSERT INTO products(product_name, product_description) VALUES('$productName', '$productDescription')";

        if(mysqli_query($conn, $sql)) {
           // Sucesso
        } else {
            echo "Não é possível enviar: " . $sql . "<br>" . mysqli_error($conn);
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
            <input type="text" name="productDescription" id="productDescription" placeholder="Descrição do produto" required>
            <input type="file" name="imgUpload" id="imgUpload" required hidden>
            <button id="choose" onclick="upload()">Escolher Imagem</button>
            <input type="submit" value="Enviar" name="submit">
        </form>
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