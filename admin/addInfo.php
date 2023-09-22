// TODA INFORMAÇÃO QUE SAIR DAQUI TERA QUE TER O MESMO ID QUE O PRODUTO 

<?php
    if (!empty($_GET['id'])) {

        include_once '../db/connection.php';
    
        $id = $_GET['id'];
    
    
        $sqlSelect = "SELECT * FROM products WHERE product_id = $id";
    
        $result = $conn->query($sqlSelect);
    
        if ($result->num_rows > 0) {
            $product_data = $result->fetch_assoc();
            
        } else {
            echo "Produto não encontrado";
        }
    } else {
        echo "ID do produto não fornecido";
    }
?>

<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="addInfoStyle.css">
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
                <form action="addInfo.php" method="POST" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <button><a href="controleDeProdutos.php">Voltar</a></button>
                        </div>
                        <div>
                        </div>
                    </div>
                    <label>Descritivos:</label><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productSmallInfo">Característica principais:</label>
                            <input type="text" name="productSmallInfo" id="productSmallInfo" required>
                            <input type="text" name="productSmallInfo" id="productSmallInfo" required>
                            <input type="text" name="productSmallInfo" id="productSmallInfo" required>
                            <input type="text" name="productSmallInfo" id="productSmallInfo" required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="productDescription">Descrição:</label>
                            <input type="text" name="productDescription" id="productDescription" required>
                        </div>
                    </div><br>
                    <div>
                    </div>
                    <label>Tabela Técnica:</label><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="tableNameInfo">Nome da especificação:</label>
                            <input type="text" name="tableNameInfo" id="tableNameInfo" placeholder="ex: POTÊNCIA"required>
                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="tableInfo">Característica da especificação:</label>
                            <input type="text" name="tableInfo" id="tableInfo"
                                placeholder="ex: 37,4 KW / 2.300 rpm" required>
                        </div>
                    </div>
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