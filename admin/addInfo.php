<?php
require_once '../db/connection.php';

if (isset($_GET['id'])) {
    $idReference = $_GET['id'];
}

if (isset($_POST['submit'])) {
    $idReference = $_POST["idReference"];
    $productDescription = $_POST['productDescription'];
    $tableNameInfo1 = $_POST["tableNameInfo1"];
    $tableInfo1 = $_POST["tableInfo1"];
    $productSmallInfo1 = $_POST["productSmallInfo1"];
    $tableNameInfo2 = $_POST["tableNameInfo2"];
    $tableInfo2 = $_POST["tableInfo2"];
    $productSmallInfo2 = $_POST["productSmallInfo2"];
    $tableNameInfo3 = $_POST["tableNameInfo3"];
    $tableInfo3 = $_POST["tableInfo3"];
    $productSmallInfo3 = $_POST["productSmallInfo3"];
    $tableNameInfo4 = $_POST["tableNameInfo4"];
    $tableInfo4 = $_POST["tableInfo4"];
    $productSmallInfo4 = $_POST["productSmallInfo4"];
    $tableNameInfo5 = $_POST["tableNameInfo5"];
    $tableInfo5 = $_POST["tableInfo5"];
    $productSmallInfo5 = $_POST["productSmallInfo5"];

    $query = "INSERT INTO productsinformations (nameInfo1, info1, product_smallinfo1, nameInfo2, info2, product_smallinfo2, nameInfo3, info3, product_smallinfo3, nameInfo4, info4, product_smallinfo4, nameInfo5, info5, product_smallinfo5, product_description, id_reference) VALUES ('$tableNameInfo1', '$tableInfo1', '$productSmallInfo1', '$tableNameInfo2', '$tableInfo2', '$productSmallInfo2', '$tableNameInfo3', '$tableInfo3', '$productSmallInfo3', '$tableNameInfo4', '$tableInfo4', '$productSmallInfo4', '$tableNameInfo5', '$tableInfo5', '$productSmallInfo5', '$productDescription', $idReference)";

    if (mysqli_query($conn, $query)) {
        echo "Informações adicionadas com sucesso.";
    } else {
        echo "Erro ao adicionar informações: " . mysqli_error($conn);
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addInfoStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Adicionar Informações Técnicas</title>
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
            <form action="addInfo.php" method="POST">
                <div class="formHeader">
                    <div class="returnBtn">
                        <a class="btn" href="controleDeProdutos.php">Voltar</a>
                    </div>
                </div>
                <label>Descritivos:</label><br>
                <div id="dynamic-inputs-info">
                    <div id="inputGroup-info" class="inputGroup">
                        <div class="inputBox">
                            <label for="productSmallInfo">Características principais:</label>
                            <input type="text" name="productSmallInfo1" id="productSmallInfo1">
                            <input type="text" name="productSmallInfo2" id="productSmallInfo2">
                            <input type="text" name="productSmallInfo3" id="productSmallInfo3">
                            <input type="text" name="productSmallInfo4" id="productSmallInfo4">
                            <input type="text" name="productSmallInfo5" id="productSmallInfo5">
                        </div>
                    </div><br>
                </div>
                <div class="inputGroup">
                    <div class="inputBox">
                        <label for="productDescription">Descrição:</label>
                        <input type="text" name="productDescription" id="productDescription">
                    </div>
                </div><br>
                <label>Tabela Técnica:</label><br>
                <div>
                    <div class="inputGroup">
                        <div class="inputBox">
                            <label for="tableNameInfo">Nome da especificação:</label>
                            <input type="text" name="tableNameInfo1" placeholder="ex: POTÊNCIA"><br>
                            <input type="text" name="tableNameInfo2" placeholder="ex: POTÊNCIA"><br>
                            <input type="text" name="tableNameInfo3" placeholder="ex: POTÊNCIA"><br>
                            <input type="text" name="tableNameInfo4" placeholder="ex: POTÊNCIA"><br>
                            <input type="text" name="tableNameInfo5" placeholder="ex: POTÊNCIA"><br>
                        </div>
                        <div class="inputBox">
                            <label for="tableInfo">Característica da especificação:</label>
                            <input type="text" name="tableInfo1" placeholder="ex: 37,4 KW / 2.300 rpm"><br>
                            <input type="text" name="tableInfo2" placeholder="ex: 37,4 KW / 2.300 rpm"><br>
                            <input type="text" name="tableInfo3" placeholder="ex: 37,4 KW / 2.300 rpm"><br>
                            <input type="text" name="tableInfo4" placeholder="ex: 37,4 KW / 2.300 rpm"><br>
                            <input type="text" name="tableInfo5" placeholder="ex: 37,4 KW / 2.300 rpm"><br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="idReference" value="<?php echo $idReference; ?>">
                <div class="updateBtn">
                    <input id="update" type="submit" value="Salvar" name="submit">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>