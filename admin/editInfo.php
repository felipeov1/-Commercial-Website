<?php
require_once '../db/connection.php';

if (isset($_GET['id'])) {



    $idReference = $_GET['id'];
    print_r($idReference);


    $sqlSelect = "SELECT * FROM productsinformations WHERE $idReference = $idReference ";
    print_r($sqlSelect);

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $productDescription = $product_data['product_description'];
    } else {
        echo "Produto não encontrado";
    }
} else {
    echo "ID do produto não fornecido";
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
            <a href="../index.php">Sair</a>
        </div>
    </nav>

    <div class="container">
        <div class="form">
            <form action="saveEditInfo.php" method="POST">
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
                            <?php
                            do {
                                echo "<input type='text' name='productSmallInfo[]' id='productSmallInfo' value=" . $product_data['product_smallinfo'] . ">";
                            } while ($product_data = $result->fetch_assoc());
                            ?>
                        </div>
                    </div><br>
                </div>
                <input class="addMore_info" type="button" onclick="addInput_info()" value="Adicionar Mais">
                <div class="inputGroup">
                    <div class="inputBox">
                        <label for="productDescription">Descrição:</label>
                        <input type="text" name="productDescription" id="productDescription"
                            value="<?php echo $productDescription ?>">
                    </div>
                </div><br>
                <label>Tabela Técnica:</label><br>
                <div>
                    <div id="dynamic-inputs">
                        <div class="inputGroup">
                            <div class="inputBox">
                                <label for="tableNameInfo">Nome da especificação:</label>
                                <?php
                                $sqlSelectTable = "SELECT * FROM productsinformations WHERE $idReference = $idReference ";
                                $resultTable = $conn->query($sqlSelectTable);
                                $tableName_data = $resultTable->fetch_assoc();

                                do {
                                    echo "<input type='text' name='tableNameInfo[]' value=" . $tableName_data['nameInfo'] . "
                                    placeholder='ex: POTÊNCIA'>";
                                } while ($tableName_data = $resultTable->fetch_assoc());
                                ?>
                            </div>
                            <div class="inputBox">
                                <label for="tableInfo">Característica da especificação:</label>
                                <?php
                                    $sqlSelectTable = "SELECT * FROM productsinformations WHERE $idReference = $idReference ";
                                    $resultTable = $conn->query($sqlSelectTable);
                                    $tableName_data = $resultTable->fetch_assoc();
                                do {
                                    echo "<input type='text' name='tableInfo[]' value=" . $tableName_data['info'] . "
                                    placeholder='ex: POTÊNCIA'>";
                                } while ($tableName_data = $resultTable->fetch_assoc());
                                ?>
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
                    <input type="text" name="tableNameInfo[]" placeholder="ex: POTÊNCIA" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="tableInfo[]" placeholder="ex: 37,4 KW / 2.300 rpm" required>
                </div>
            `;
            dynamicInputs.appendChild(inputGroup);
        }

        function addInput_info() {
            let dynamicInputs = document.getElementById("dynamic-inputs-info");
            let inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group");
            inputGroup.innerHTML = `
                <div class="inputBox">
                    <input type="text" name="productSmallInfo[]" id="productSmallInfo" required>
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