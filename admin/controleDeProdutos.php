<?php
    require_once '../db/connection.php';

    $sql = "SELECT * FROM  `products` ORDER BY `products`.`product_id` DESC";

    $result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="controleDeProdutosStyle.css">
    <title>Document</title>
</head>
<body>
<header>
    <a href="../index.php">Index</a>
    <nav class="nav-bar">
        <div class="logo">
            <img src="../img/logo.png" alt="logo" width="160px">
        </div>
    </nav>
    </header><br>

    <section>
        <button id="btnAdd"><a href="./novoProduto.php">Adicionar Produto</a></button>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                while($products_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td  style='height:75px; width:50px'>" .$products_data['product_id']. "</td>";
                    echo "<td>" .$products_data['product_image']. "</td>"; 
                    echo "<td>" .$products_data['product_name']."</td>";                   
                    echo "<td><img src=\"<?php include 'novoProduto.php' echo $image[path]; ?>\"alt=\"\"></td>";
                    echo "<td> 
                        <a class='btn-primary' href='edit.php?id=$products_data[product_id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg>
                        </a>
                        <a class=' btn-danger' href='delete.php?id=$products_data[product_id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='red' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>";
                }
    
                // DESCRIÇÃO FAZER UMA FUNÇÃO PARA APARECER TEXTO COMPLETO
            ?>
        </table>
    </section>

</body>
</html>