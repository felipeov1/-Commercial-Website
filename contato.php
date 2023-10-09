<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="contactStyle.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Empresa</title>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" height="70px" alt="Imagem Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    <a class="nav-link" href="empilhadeiras.php">Empilhadeiras</a>
                    <a class="nav-link" href="contato.php">Contato</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="frmTitle container-fluid">
        <h1>Entre em Contato</h1>
        <p>Possuímos divesas formas de contato para atendimento.</p>
    </div>
    <div class="container container-fluid ">
        <div class="row">
            <div class="contactColum col-sm">
                <h1>Formulário de Contato</h1>
                <p>Para entrar em contato conosco por email, preencha o formulário abaixo e clique em Enviar Mensagem.
                </p>
                <hr>
                <form class="frmMain" action="enviarEmail.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nome:</label>
                        <input type="name" name="name" class="form-control" placeholder="seu nome" required>
                    </div>
                    <div class="mb-3">
                        <div class="conatinerContact container">
                            <div class="row">
                                <div class="col gx-2">
                                    <label class="form-label">Email:</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="nome@exemplo.com" required>
                                </div>
                                <div class="celular col  gx-2">
                                    <label class="form-label">Celular:</label>
                                    <input type="tel" name="tel" class="form-control"
                                        placeholder="DDD + número" id="telefoneInput" required>
                                </div>

                                <script>
                                    function formatarTelefone() {
                                        let telefoneInput = document.getElementById('telefoneInput');
                                        let valor = telefoneInput.value;

                                        valor = valor.replace(/\D/g, '');

                                        if (valor.length === 11) {
                                            valor = `(${valor.substr(0, 2)}) ${valor.substr(2, 1)}${valor.substr(3, 4)}-${valor.substr(7)}`;
                                        } 
                                        telefoneInput.value = valor;
                                    }

                                    let telefoneInput = document.getElementById('telefoneInput');
                                    telefoneInput.addEventListener('input', formatarTelefone);
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
                        <textarea type="textarea" name="textarea" class="form-control" rows="8"></textarea required>
                    </div>
                    <div class="btn d-grid gap-2">
                        <button class="btn btn-dark" name="enviar" type="submit">Enviar Mensagem</button>
                    </div>
                    <p>Entraremos em contato com você o mais rápido possível</p>
                </form> 
              
            </div>
            <div class="information mapsColum col-sm">
                <div class="container text-center">
                    <div class="contactInformation row">
                      <div class="whatsapp col-5">
                        <h1>WhatsApp:</h1>
                        <p>(xx) xxxxx-xxxx</p>
                      </div>
                      <div class="email col-6">
                        <h1>E-mail:</h1>
                        <p>seuemail@contato.com</p>
                      </div>
                      <div class="adresse row">
                        <div class="col-4">
                            <h1>Endereço:</h1>
                            <p>Rua...</p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="mediaIcon">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="" class="text-black"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="text-black"><i class="bi bi-whatsapp"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="text-black"><i class="bi bi-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div id="map">
                    <script>
                        var map = L.map('map').setView([-23.3122, -51.159656], 13);
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
                        L.marker([-23.3122, -51.159656]).addTo(map)
                            .bindPopup('Sua empresa.<br>')
                            .openPopup();
                    </script>
                </div>
            </div>
        </div>
    </div>


    <footer class=" footer text-white bg-dark pt-5 pb-4">
        <div class="container text-center text-md-start">

            <div class="row text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4"><img src="img/logo.png" height="150px" alt="Imagem Logo"></h5>
                    </div>

                    <div class="footerNav col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Navegação
                        </h5>
                        <hr class="mb-4" width=230px>
                        <p>
                            <a href="index.php">Início</a>
                        </p>
                        <p>
                            <a href="empilhadeira.php">Empilhadeiras</a>
                        </p>
                        <p>
                            <a href="contato.php">Contato</a>
                        </p>
                    </div>
                    <div class="ContactBar col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
                        <h5 class=" mb-4 font-weight-bold text-white">
                            Contato
                        </h5>
                        <hr class="mb-4" width=230px>
                        <p>
                            <a ef="" class="bi bi-geo-alt-fill"> Seu endereço</a><br>
                        </p>
                        <p>
                            <a ef="" class="bi bi-telephone-fill"> (xx) xxxx-xxxx</a><br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</html>