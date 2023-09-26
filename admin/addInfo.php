<?php
require_once '../db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idReference = $_POST['idReference'];
    $productSmallInfo = $_POST['productSmallInfo'];
    $productDescription = $_POST['productDescription'];
    $tableNameInfos = $_POST['tableNameInfo'];
    $tableInfos = $_POST['tableInfo'];


    $stmt = $conn->prepare("INSERT INTO productsinformations (product_smallinfo, product_description, nameInfo, info, id_reference) VALUES (?, ?, ?, ?, ?)");

    for ($i = 0; $i < count($tableNameInfos); $i++) {
        $stmt->bind_param("ssssi", $productSmallInfo, $productDescription, $tableNameInfos[$i], $tableInfos[$i], $idReference);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "Informações adicionadas com sucesso.";
}
?>

<<!DOCTYPE html>
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
                        <button><a href="controleDeProdutos.php">Voltar</a></button>
                    </div>
                </div>
                <label>Descritivos:</label><br>
                <div class="inputGroup">
                    <div class="inputBox">
                        <label for="productSmallInfo">Características principais:</label>
                        <input type="text" name="productSmallInfo" id="productSmallInfo" required>
                    </div>
                </div><br>
                <div class="inputGroup">
                    <div class="inputBox">
                        <label for="productDescription">Descrição:</label>
                        <input type="text" name="productDescription" id="productDescription" required>
                    </div>
                </div><br>
                <label>Tabela Técnica:</label><br>
                <div>
                    <div id="dynamic-inputs">
                        <div class="inputGroup">
                            <div class="inputBox">
                                <label for="tableNameInfo">Nome da especificação:</label>
                                <input type="text" name="tableNameInfo[]" placeholder="ex: POTÊNCIA" required>
                            </div>
                            <div class="inputBox">
                                <label for="tableInfo">Característica da especificação:</label>
                                <input type="text" name="tableInfo[]" placeholder="ex: 37,4 KW / 2.300 rpm" required>
                            </div>
                        </div>
                    </div>
                    <input class="addMore" type="button" onclick="addInput()" value="Adicionar Mais">
                </div>
                <input type="hidden" name="idReference" value="<?php echo $idReference; ?>">
                <div class="updateBtn">
                    <input id="update" type="submit" value="Salvar" name="submit">
                </div>
            </form>
        </div>
    </div>

    <script>
        function addInput() {
            let dynamicInputs = document.getElementById("dynamic-inputs");
            let inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group");
            inputGroup.innerHTML = `
                <div class="inputBox">
                    <label for="tableNameInfo">Nome da especificação:</label>
                    <input type="text" name="tableNameInfo[]" placeholder="ex: POTÊNCIA" required>
                </div>
                <div class="inputBox">
                    <label for="tableInfo">Característica da especificação:</label>
                    <input type="text" name="tableInfo[]" placeholder="ex: 37,4 KW / 2.300 rpm" required>
                </div>
            `;
            dynamicInputs.appendChild(inputGroup);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>