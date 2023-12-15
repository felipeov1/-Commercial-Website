<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header('Location: login.php');
    exit();
}
var_dump($_GET['id']);


if (!empty($_GET['id'])) {
    include_once('../db/connection.php');

    $id = $_GET['id'];
    
    // Evite SQL injection utilizando prepared statements
    $sqlSelect = "SELECT * FROM forklift_page WHERE id=?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM forklift_page WHERE id=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param('i', $id);
        $resultDelete = $stmtDelete->execute();

        if ($resultDelete) {
            header('Location: ./editarPaginaEmpilhadeiras.php');
            exit();
        } else {
            echo "Erro ao excluir o registro.";
        }
    } else {
        echo "Registro não encontrado.";
    }

    $stmt->close();
    $stmtDelete->close();
    $conn->close();
} else {
    echo "ID não fornecido.";
}
?>