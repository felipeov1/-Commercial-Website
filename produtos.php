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

    <main class="main-container">
        <?php
        while ($products_data = mysqli_fetch_assoc($result)) {
            echo "<main class='main'>";
            echo    "<div class='card'>";
            echo        "<div class='image'>";
            $img = $products_data['product_imgName'];
            echo             "<img src='../SiteVendas/admin/imagesUpload/$img'>";
            echo        "</div>";
            echo        "<div class='caption'>";
            echo            "<p class='productNameTitle'>" . $products_data['product_name'] . "</p>";
            echo            "<p class='productDescription'>" . $products_data['product_description'] . "</p>";
            echo       "</div>";
            echo            "<button class='more_information'>Mais informações</button>";
            echo   "</div>";
            echo "</main>";
        }
        ?>
    </main>
</body>
</html>