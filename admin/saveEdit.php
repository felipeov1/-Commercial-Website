<?php

    include_once('../db/connection.php');

    if(isset($_POST['update'])){
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];

        $sqlUpdate = "UPDATE products SET product_name='$productName' ,product_description='$productDescription' WHERE product_id='$productName'";

        $result = $conn->query($sqlUpdate);

    }
    hearder('Location: controleDeProdutos.php');