<?php

include_once "./db/connection.php";

$sqlSelect = "SELECT * FROM products ORDER BY product_id DESC";

$result = $conn->query($sqlSelect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produtos.css">
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
                    <li class="nav-text"><a href="/SiteVendas" class="nav-link"><b>INÍCIO</b></a></li>
                    <li class="nav-text"><a href="#" class="nav-link"><b>EMPILHADEIRAS</b></a></li>
                    <li class="nav-text"><a href="#" class="nav-link"><b>CONTATO</b></a></li>
                </ul>
            </div>

            <div class="menu-item">
                <a href="#"><img src="img/menuIcon.png" alt="" width="45px"></a>
            </div>
        </nav>
    </header><br>

    <?php
    while($products_data = mysqli_fetch_assoc($result)){
    "<maitn>
        <div class='card'>
            <div class='image'>
                <img src=''>
            </div>
            <div class='caption'>
                <p class='product-name'" . $products_data['product_name'] . "</p>
                <p class='description'" . $products_data['product_description'] ."</p>
            </div>
                <button class='more_information'>Mais informações</button>
        </div>
    </main>";
    }
    ?>
</body>
</html>