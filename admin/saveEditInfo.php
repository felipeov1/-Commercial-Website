<?php
require_once '../db/connection.php';

if (isset($_POST['submit'])) {
    $idReference = $_POST['idReference'];
    $productDescription = $_POST['productDescription'];

    for ($i = 1; $i <= 5; $i++) {
        $productSmallInfo = $_POST['productSmallInfo'][$i];
        $sqlUpdateSmallInfo = "UPDATE productsinformations SET product_smallinfo$i = '$productSmallInfo' WHERE id_reference = $idReference";
        $conn->query($sqlUpdateSmallInfo);
    }

    for ($i = 1; $i <= 5; $i++) {
        $nameInfo = $_POST['nameInfo'][$i];
        $info = $_POST['info'][$i];

        if (!empty($nameInfo) && !empty($info)) {
            $sqlUpdateInfo = "UPDATE productsinformations SET nameInfo$i = '$nameInfo', info$i = '$info' WHERE id_reference = $idReference";
            $conn->query($sqlUpdateInfo);
        }
    }

    $sqlUpdateDescription = "UPDATE productsinformations SET product_description = '$productDescription' WHERE id_reference = $idReference";
    $conn->query($sqlUpdateDescription);

    header("Location: editInfo.php?id=$idReference");
}
?>