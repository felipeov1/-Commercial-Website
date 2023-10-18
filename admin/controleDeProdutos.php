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

$sql = "SELECT * FROM  `products` ORDER BY `products`.`product_id` DESC";

$result = $conn->query($sql);


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
            <a class="navbar-brand" href="controleDeProdutos.php"><img src="../img/logo.png" height="70px"
                    alt="Imagem Logo"></a>
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
                <li><a class="dropdown-item" href="./novoProduto.php">Adicionar Produto</a></li>
                <li><a class="dropdown-item" href="./email.php">Email de contato</a></li>
                <li><a class="dropdown-item" href="./administradores.php">Administradores</a></li>
            </ul>
        </div>
        <table>
            <thead id="thead">
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Detalhe</th>
                    <th>Detalhe</th>
                    <th>Detalhe</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            while ($products_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                $img = $products_data['product_image'];
                echo "<td><img height='80' src='$img'></td>";
                echo "<td>" . $products_data['product_name'] . "</td>";
                echo "<td>" . $products_data['product_detail1'] . "</td>";
                echo "<td>" . $products_data['product_detail2'] . "</td>";
                echo "<td>" . $products_data['product_detail3'] . "</td>";
                echo "<td>";
                echo "<div class='container btnContainer'>
<button id='btnAction' style='background-color: lightgray;';><a href='addInfo.php?id=" . $products_data['product_id'] . "'>Adicionar informações</a></button>
                <button id='btnAction' style='background-color: lightgray;';><a href='editInfo.php?id=" . $products_data['product_id'] . "'>Editar informações</a></button>
                <button id='btnAction' style='background-color: lightgray;';><a  href='edit.php?id=" . $products_data['product_id'] . "'>Editar caracteristicas</a></button>
                <button id='btnAction' style='background-color: lightgray;';><a href='delete.php?id=" . $products_data['product_id'] . "'>Excluir</a></button>
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