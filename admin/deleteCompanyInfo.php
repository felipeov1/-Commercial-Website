<?php

    if(!empty($_GET['id'])){

        include_once('../db/connection.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM company WHERE id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM company WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

        }
        header('Location: infoEmpresa.php');
    }
