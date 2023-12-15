<?php
require_once './db/connection.php';

$sql = "SELECT * from `mail`";
$result = $conn->query($sql);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("./admin", 'data.env');
$dotenv->load();

if (isset($_POST['enviar'])) {

    $mail = new PHPMailer(true);
    $products_data = mysqli_fetch_assoc($result);

    try {
        $mail->isSMTP();
        $mail->Host = $products_data['host']; //$_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $products_data['user']; //$_ENV['EMAIL_USERNAME'];
        $mail->Password = $products_data['password']; //$_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = $products_data['port'];
        ;


        $mail->setFrom( /*$_ENV['EMAIL_USERNAME']*/$products_data['user'], 'Nome da Empresa');
        $mail->addAddress( /*$_ENV['EMAIL_USERNAME']*/$products_data['receive']); 

        $mail->isHTML(true);



        $mail->Subject = 'Mensagem de contato via site - Empilhadeiras ';

        $body = "Mensagem enviada através do site, segue 
                informações abaixo:<br>
                Nome: $_POST[name]<br>
                Email: $_POST[email]<br>
                Telefone: $_POST[tel]<br>
                Mensagem: $_POST[textarea]";

        $mail->Body = $body;

        $mail->send();
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro ao enviar a mensagem, acesso não foi via formulário";
}

// Create a new PHPMailer instance for the client
$mailClient = new PHPMailer(true);

try {
    $mailClient->isSMTP();
    $mailClient->Host = $products_data['host']; 
    $mailClient->SMTPAuth = true;
    $mailClient->Username = $products_data['user']; 
    $mailClient->Password = $products_data['password']; 
    $mailClient->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mailClient->Port = $products_data['port'];

    $mailClient->setFrom($products_data['user'], 'Empresa Nome');
    $mailClient->addAddress($_POST['email'], $_POST['name']); // Destination client email

    $mailClient->isHTML(true);

    $mailClient->Subject = 'Mensagem de contato via site - Empilhadeiras';

    $body = "Segue uma cópia de sua mensagem de contato:<br>
            Nome: $_POST[name]<br>
            Email: $_POST[email]<br>
            Telefone: $_POST[tel]<br>
            Mensagem: $_POST[textarea]";

    $mailClient->Body = $body;

    $mailClient->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mailClient->ErrorInfo}";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="enviadoStyle.css">
    <title>CONTATO</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" height="70px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    <a class="nav-link" href="#">Empilhadeiras</a>
                    <a class="nav-link" href="#">Contato</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="boxMessage container-fluid">
        <h1>Obrigado!</h1>
        <p>A sua mensagem foi enviada e logo entraremos em contato.</p>
        <a href="index.php"><button id="btnReturn">Voltar</button></a>
    </div>

    <div class="blank container-fluid"></div>
    <footer class=" footer text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">

            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4"><img src="img/logo.png" height="150px" alt=""></h5>
                    </div>
                    <div class="footerNav col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Navegação
                        </h5>
                        <hr class="mb-4">
                        <p>
                            <a href="">Início</a>
                        </p>
                        <p>
                            <a href="">Empilhadeiras</a>
                        </p>
                        <p>
                            <a href="">Contato</a>
                        </p>
                    </div>
                    <div class="ContactBar col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Contato
                        </h5>
                        <hr class="mb-4">
                        <p>
                            <a href="" class="bi bi-geo-alt-fill"> Seu endereço</a><br>
                        </p>
                        <p>
                            <a href="" class="bi bi-telephone-fill"> (xx) xxxx-xxxx</a><br>
                        </p>
                        <p>
                        </p>
                        <a href="" class="bi bi-envelope-fill"> seuemail@contato.com</a>
                        </p><br><br>
                    </div>
                    <hr class="mb-4">
                    <div class=" mediaIcon text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-whatsapp"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white"><i class="bi bi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

</html>