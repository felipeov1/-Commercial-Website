<?php
    if(!empty($_GET['id'])) {
        include_once('../db/connection.php');

        $id = $_GET['id'];
        
        $sqlSelect = "SELECT * FROM products WHERE product_id=$id";

        $result = $conn->query($sqlSelect);

        while($product_data = mysqli_fetch_assoc($result)){
            $productName = $product_data['product_name'];
            $productDescription = $product_data['product_description'];
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

    <a href="./controleDeProdutos.php">Voltar</a>
    <section id="upload-section">
        <form action="saveEdit.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="productName" id="productName" placeholder="Nome do produto" value='<?php echo $productName ?>' required>

            <input type="text" name="productDescription" id="productDescription" placeholder="Descrição do produto" value="<?php echo $productDescription ?>" required>

            <!-- <input type="file" name="imgUpload" id="imgUpload" required hidden>

            <button id="choose" onclick="upload()">Alterar Imagem</button> -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar" name="update" id="update">
        </form>
    </section>
    
    <!-- <script>
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
    </script> -->

</body>
</html>