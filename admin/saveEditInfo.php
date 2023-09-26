<?php
require_once '../db/connection.php';

if (isset($_GET['id'])) {
    $idReference = $_GET['id'];
}

if (isset($_POST['submit'])) {
    $idReference = $_POST["idReference"];
    $productSmallInfo = $_POST['productSmallInfo'];
    $productDescription = $_POST['productDescription'];
    $tableNameInfos = $_POST['tableNameInfo'];
    $tableInfos = $_POST['tableInfo'];


    $stmt = $conn->prepare("UPDATE productsinformations SET nameInfo = ?, info = ?, product_smallinfo = ?, product_description = ?, id_reference = ?");
        for ($i = 0; $i < count($tableNameInfos); $i++) {
        $stmt->bind_param("ssssi", $tableNameInfos[$i], $tableInfos[$i], $productSmallInfo[$i], $productDescription, $idReference);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();

}
header("Location: controleDeProdutos.php");
