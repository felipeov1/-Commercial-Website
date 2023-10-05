<?php
require_once '../db/connection.php';

if (isset($_GET['id'])) {

    $idReference = $_GET['id'];
    $sqlSelect = "SELECT * FROM productsinformations WHERE id_reference = $idReference ";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
        $productDescription = $product_data['product_description'];
        $productSmallInfo1 = $product_data['product_smallinfo1'];
        $productSmallInfo2 = $product_data['product_smallinfo2'];
        $productSmallInfo3 = $product_data['product_smallinfo3'];
        $productSmallInfo4 = $product_data['product_smallinfo4'];
        $productSmallInfo5 = $product_data['product_smallinfo5'];
        $tableNameInfo1 = $product_data["nameInfo1"];
        $tableNameInfo2 = $product_data["nameInfo2"];
        $tableNameInfo3 = $product_data["nameInfo3"];
        $tableNameInfo4 = $product_data["nameInfo4"];
        $tableNameInfo5 = $product_data["nameInfo5"];
        $tableInfo1 = $product_data["info1"];
        $tableInfo2 = $product_data["info2"];
        $tableInfo3 = $product_data["info3"];
        $tableInfo4 = $product_data["info4"];
        $tableInfo5 = $product_data["info5"];

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
            <form action="saveEditInfo.php" method="POST">
                <div class="formHeader">
                    <div class="returnBtn">
                        <a class="btn" href="controleDeProdutos.php">Voltar</a>
                    </div>
                </div>
                <div id="dynamic-inputs-info">
                    <div id="inputGroup-info" class="inputGroup">
                        <div class="inputBox">
                            <label for="productSmallInfo">Características principais:</label>
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                $smallInfo = 'product_smallinfo' . $i;

                                if (!empty($product_data[$smallInfo])) {
                                    echo "<input type='text' name='productSmallInfo[$i]' id='productSmallInfo' value=" .
                                        $product_data[$smallInfo] . ">";
                                }
                            }
                            ?>
                        </div>
                    </div><br>
                </div>
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
                                for ($i = 1; $i <= 5; $i++) {
                                    $nameInfo = 'nameInfo' . $i;

                                    if (!empty($product_data[$nameInfo])) {
                                        echo "<input type='text' name='nameInfo[$i]' id='nameInfo[$i]' value=" .
                                            $product_data[$nameInfo] . ">";
                                    }else{
                                        echo "<input type='text' name='info' id='info' value= ''>"; 
                                    }
                                }
                                ?>
                            </div>
                            <div class="inputBox">
                                <label for="tableInfo">Característica da especificação:</label>
                                <?php
                                $sqlSelect = "SELECT * FROM productsinformations WHERE id_reference = $idReference ";
                                $result_info = $conn->query($sqlSelect);


                                for ($i = 1; $i <= 5; $i++) {
                                    $info = 'info' . $i;

                                    if (!empty($product_data[$info])) {
                                        echo "<input type='text' name='info[$i]' id='info[$i]' value=" .
                                            $product_data[$info] . ">";
                                    }else{
                                        echo "<input type='text' name='info' id='info' value= ''>"; 
                                    }
                                }
                                


                                ?>
                            </div>
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

