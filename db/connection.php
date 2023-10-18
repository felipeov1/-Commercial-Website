<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'empilhadeiras';

    $conn = new mysqLi($dbHost,$dbUsername,$dbPassword,$dbName, 3306);

    if (!$conn) {
        die("Falha na conexão ao banco de dados: " . mysqli_connect_error());
    }

    
