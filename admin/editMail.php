<?php
if (!empty($_GET['id'])) {

    include_once '../db/connection.php';

    $id = $_GET['id'];


    $sqlSelect = "SELECT * FROM mail WHERE id = $id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $id = $product_data['id'];
        $host = $product_data['host'];
        $receive = $product_data['receive'];
        $user = $product_data['user'];
        $password = $product_data['password'];
        $port = $product_data['port'];
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
        <link rel="stylesheet" href="addMailStyle.css">
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
                <form method="POST" action="./saveEditMail.php" enctype="multipart/form-data">
                    <div class="formHeader">
                        <div class="returnBtn">
                            <a href="email.php">Voltar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="host">Host:</label>
                            <input type="text" name="host" id="host" value="<?php echo $host ?>">
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="host">Email de recebimento:</label>
                            <input type="text" name="host" id="host" value="<?php echo $receive ?>">
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="user">Usuário:</label>
                            <input type="text" name="user" id="user" value="<?php echo $user ?>">
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="password">Senha:</label>
                            <input type="text" name="password" id="password" value="<?php echo $password ?>">
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="port">Porta:</label>
                            <input type="text" name="port" id="port" value="<?php echo $port ?>">
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