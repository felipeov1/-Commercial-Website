<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: login.php');
    exit();
}
$logado = $_SESSION['email'];
require_once '../db/connection.php';

$sql = "SELECT * FROM  `main_page`";

$result = $conn->query($sql);

$sqlLogo = "SELECT * FROM `company`";
$resultLogo = $conn->query($sqlLogo);
$dataLogo = mysqli_fetch_assoc($resultLogo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="controleDeProdutosStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Empresa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="<?php $dataName = $dataLogo['logoName']; 
            $path = "./imagesUpload/";
            $img = ($path . $dataName);
            echo $img ?>" height="100px" alt="Logo"></a>
            <a href="../index.php"><button class="btn btn-outline-danger" type="submit">Sair</button></a>
        </div>
    </nav>
    <section>
        <div class="dropdown">
            <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Gerenciar
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./adicionarInfoPaginaPrincipal.php">Adicionar informações</a></li>
                <li><a class="dropdown-item" href="./controleDeProdutos.php">Controle de produtos</a></li>
            </ul>
        </div>
        <table>
            <thead id="thead">
                <tr>
                    <th>Banner 1</th>
                    <th>Banner 2</th>
                    <th>Banner 3</th>
                    <th>Título do card</th>
                    <th>Imagem do card</th>
                    <th>Texto da sessão de exploração</th>
                    <th>Nossa missão imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            while ($products_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                $img1 = $products_data['banner1']; 
                echo "<td><img height='80' src='$img1'></td>";
                $img2 = $products_data['banner2']; 
                echo "<td><img height='80' src='$img2'></td>";
                $img3 = $products_data['banner3']; 
                echo "<td><img height='80' src='$img3'></td>";
                echo "<td>" . $products_data['cardName'] . "</td>";
                $img1 = $products_data['cardImg']; 
                echo "<td><img height='80' src='$img1'></td>";
                echo "<td>" . $products_data['exploreSectionText'] . "</td>";
                $img2 = $products_data['missionImg']; 
                echo "<td><img height='80' src='$img2'></td>";
                echo "<td>";
                echo "<div class='container btnContainer'>
                <button id='btnAction' style='background-color: lightgray;';><a href='editInfoPaginaPrincipal.php?id=" . $products_data['id'] . "'>Editar informações</a></button>
                <button id='btnAction' style='background-color: lightgray;';><a href='deletePaginaPrincipal.php?id=" . $products_data['id'] . "'>Excluir</a></button>
                </div>";
                "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

</html>