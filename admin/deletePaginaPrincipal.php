<?php

    if(!empty($_GET['id'])){

        include_once('../db/connection.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM main_page WHERE id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM main_page WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

        }
        header('Location: editarPaginaPrincipal.php');
    }
