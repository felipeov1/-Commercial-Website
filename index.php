<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="img/logo.png" alt="logo" width="160px">
            </div>

            <div class="nav-list">
                <ul>
                    <li class="nav-text"><a href="#" class="nav-link"><b>INÍCIO</b></a></li>
                    <li class="nav-text"><a href="produtos.php" class="nav-link"><b>EMPILHADEIRAS</b></a></li>
                    <li class="nav-text"><a href="#" class="nav-link"><b>CONTATO</b></a></li>
                </ul>
            </div>

            <div class="menu-item">
                <a href="#"><img src="img/menuIcon.png" alt="" width="45px"></a>
            </div>
        </nav>
    </header><br>
    <div class="banner-img">
        <img src="img/banner-apresentacao.jpg" alt="" width="100%" height="500px">
    </div>
    <section>  

        <div class="nav-produtos"> <!-- AQUI RECEBRÁ OS ITENS DO BANCO DE DADOS -->
            <a href="/SiteVendas/produtos.php"><input class="btn-produtos" type="submit" value="Página Produtos"></a>
            <ul>
                <li class="nav-item"><a href="#" class="nav-link"><img src="img/1-1d-empilhadeira.jpg" alt="" height="200px"></a><b><p>Empillhadeiras Série EFFO</p></b></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="img/1.5-2.0T.jpg" alt="" height="200px"></a><b> <p>Empilhadeiras de Tamanho Médio I</p></b></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="img/5t.jpg" alt="" height="200px"></a><b><p>Empilhadeiras de Tamanho Médio II</p> </b></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="img/1.5T.jpg" alt="" height="200px"></a><b><p>Empilhadeiras Elétricas</p></b></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="img/1.5-2.0T.jpg" alt="" height="200px"></a><b><p>Empilhadeira Elétrica de Três Rodas 1.5-2.0T</p></b></li>
            </ul>
        </div>
        
        <div class="text-box">
            <h1>ENTRE EM CONTATO E FAÇA SEU ORÇAMENTO!</h1><br>
            <img src="img/mapa.png" alt="" width="35px"><p>Seu endereço</p>
            <img src="img/o-email.png" alt="" width="35px"><p>suaempresa@contato.com.br</p>
            <img src="img/whatsapp.png" alt="" width="35px"><p>(xx) xxxx-xxxx</p>

            <form action="" method="post">
                <input type="text" name="name" placeholder="Seu nome"><br><br>
                <input type="text" name="email" placeholder="Seu email"><br><br>
                <input type="text" name="email" placeholder="Seu telefone"><br><br>
                
                <textarea name="mensagem" cols="30" rows="10" placeholder="Digite sua mensagem"></textarea><br>
                <button type="submit">Enviar</button>  
            </form>
        </div>
    </section>
    <footer></footer>
</body>
</html>