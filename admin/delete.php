<?php
    if(!empty($_GET['product_id'])){
        include_once('../db/connection.php');

        $id = $_GET['product_id'];

        $sqlSelect = "SELECT * FROM products WHERE product_id = $product_id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM products WHERE product_id = $product_id";
            $resultDelete = $conn->query($sqlDelete);

            echo $sqlDelete;
        }
    }
    header('Location: controleDeProdutos.php');
