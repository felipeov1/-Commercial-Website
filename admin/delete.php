<?php

    if(!empty($_GET['id'])){

        include_once('../db/connection.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM products WHERE product_id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM products WHERE product_id=$id";
        $resultDelete = $conn->query($sqlDelete);

        }
    }
    header('Location: controleDeProdutos.php');