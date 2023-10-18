<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && ($_POST['password'])) {
    // acessa
    include_once('../db/connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE user_email = '$email' and user_password = '$password'";

    $result = $conn->query($sql);


    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header('Location: index.php');
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: ../admin/controleDeProdutos.php');
    }
} else {

    header('Location: index.php');

}