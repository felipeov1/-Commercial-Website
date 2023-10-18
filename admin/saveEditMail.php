<?php

    include_once('../db/connection.php');


    if(isset($_POST['submit'])){
        $host = $_POST['host'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $port = $_POST['port'];

        $sqlUpdate = "UPDATE mail SET host='$host', user='$user', password='$password', port='$port'  WHERE id";
              
        $result = $conn->query($sqlUpdate);
        
    }
    header("Location: email.php");
