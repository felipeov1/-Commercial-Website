<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adm/administrador.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="img/logo.png" alt="logo" width="160px">
            </div>
        </nav>
    </header><br>
    <div id="main-tabs">
        <a href="administrados.php">Atualizar</a>
        <a href="produtos.php">Produtos</a>
    </div><br>

    <section id="upload-section">
        <form action="administrador.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="productName" id="productName" placeholder="Nome do produto" required>
            <input type="text" name="productDescription" id="productDescription" placeholder="Descrição do produto" required>
            <input type="file" name="imgUpload" id="imgUpload" required hidden>
            <button id="choose" onclick="upload()">Escolher Imagem</button>
            <input type="submit" value="Atualizar" name="submit">
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
            console.log(file)
            choose.innerHTML = file.name; 
        });
    </script>
</body>
</html>