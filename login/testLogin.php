<?php
    session_start();

    print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && ($_POST['password'])){
        // acessa
        include_once('../db/connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];

        print_r('Email: ' . $email);
        print_r('<br>');
        print_r('Senha: ' . $password);

        $sql = "SELECT * FROM users WHERE user_email = '$email' and user_password = '$password'";

        $result = $conn->query($sql);

        print_r($sql);
        print_r('<br>');
        print_r($result);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            header('Location: login.php');
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: ../admin/controleDeProdutos.php');
        }

    } else {
        header('Location: login.php');
        echo "erro";

    }