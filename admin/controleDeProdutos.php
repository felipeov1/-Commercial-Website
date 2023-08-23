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
    while($products_data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $products_data['product_id'] . "</td>";
        $img = $products_data['product_image'];
        echo "<td><img height='80' src='$img'></td>";
        echo "<td>" . $products_data['product_name'] . "</td>";
        echo "<td>" . $products_data['product_description'] . "</td>";
        echo "<td>
            <a class='btn btn-sm btn-primary' href='edit.php?id=" . $products_data['product_id'] . "'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='blue' class='bi bi-pencil' viewBox='0 0 16 16'>
                    class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
            </a>
            <a class='btn btn-sm btn-danger' href='delete.php?id=" . $products_data['product_id'] . "'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-trash' viewBox='0 0 16 16'>
                    bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                </svg>
            </a>
        </td>";
        echo "</tr>";
    }
?>
    
                
        </table>
    </section>

</body>
</html>