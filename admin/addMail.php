<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php');
    exit();
}
$logado = $_SESSION['email'];

require_once '../db/connection.php';

if (isset($_POST['submit'])) {

    $host = $_POST["host"];
    $receive = $_POST["receive"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    $port = $_POST["port"];

    $sqlSelect = "SELECT * FROM mail";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        echo "Já existe um email cadastrado, edite ou exclua o atual";
    } else if ($resultSelect->num_rows === 0) {
        $query = "INSERT INTO mail (host, user, password, port, receive) VALUES ('$host',  '$user', '$password', '$port', '$receive')";
        $result = $conn->query($query);

    } else {
        echo "Erro ao adicionar informações: " . mysqli_error($conn);
    }
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
                <form method="POST" action="./addMail.php" enctype="multipart/form-data">
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
                            <input type="text" name="host" id="host" required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="host">Email de recebimento:</label>
                            <input type="text" name="receive" id="receive" required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="user">Usuário:</label>
                            <input type="text" name="user" id="user" required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="password">Senha:</label>
                            <input type="text" name="password" id="password" required>
                        </div>
                    </div><br>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="port">Porta:</label>
                            <input type="text" name="port" id="port" required>
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