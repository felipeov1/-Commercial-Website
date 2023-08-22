<?php

    include_once('../db/connection.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];

        $sqlUpdate = "UPDATE products SET product_name='$productName' ,product_description='$productDescription' WHERE product_id='$id'";

        $result = $conn->query($sqlUpdate);

    }
header('Location: controleDeProdutos.php');
