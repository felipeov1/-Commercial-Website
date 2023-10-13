<?php

    if(!empty($_GET['id'])){

        include_once('../db/connection.php');

        $id = $_GET['id'];
        echo $id;
        $sqlSelect = "SELECT * FROM users WHERE id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM users WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

        }
    }
    header('Location: administradores.php');

