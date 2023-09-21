<?php

    include_once('../db/connection.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $productName = $_POST['productName'];
        $productDetail1 = $_POST['productDetail1'];
        $productDetail2 = $_POST['productDetail2'];
        $productDetail3 = $_POST['productDetail3'];

        $sqlUpdate = "UPDATE products SET product_name='$productName', product_detail1='$productDetail1', product_detail2='$productDetail2', product_detail3='$productDetail3'  WHERE product_id ='$id'";

        echo  $sqlUpdate;
              
        $result = $conn->query($sqlUpdate);

        
         echo $id;   
    }

