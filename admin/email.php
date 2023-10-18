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

$sql = "SELECT * FROM  mail";

$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="administradoresStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Administrador</title>
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
    <button id='btnReturn' style='background-color: lightgray;'><a  href='controleDeProdutos.php'>Voltar</a></button>
    <button id='btnAdd' style='background-color: lightgray;'><a  href='addMail.php'>Adiconar email</a></button>
        <table>
            <thead id="thead">
                <tr>
                    <th>Host</th>
                    <th>Usuário</th>
                    <th>Senha</th>
                    <th>Porta</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <?php
            while ($products_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $products_data['host'] . "</td>";
                echo "<td>" . $products_data['user'] . "</td>";
                echo "<td>" . $products_data['password'] . "</td>";
                echo "<td>" . $products_data['port'] . "</td>";
                echo "<td>";
                echo "<div class='container btnContainer'>
                <button id='btnAction' style='background-color: lightgray;';><a href='editMail.php?id=" . $products_data['id'] . "'>Editar</a></button>
                <button id='btnAction' style='background-color: red;';><a href='deleteMail.php?id=" . $products_data['id'] . "'>Excluir</a></button>
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
