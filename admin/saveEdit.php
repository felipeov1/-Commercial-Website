<?php
include_once('../db/connection.php');
if (isset($_POST["update"])) {
  if (isset($_FILES['imgUpload'])) {

    $imageOg = $_POST['originalImgName'];


    $path = "imagesUpload/";
    $imageName = $_FILES['imgUpload']['name'];
    $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    if (!empty($imageOg) && empty($imageName)) {
      $pathImg = $path . $imageOg;
    } else {
      if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
        die('Tipo de arquivo não aceito');
      }

      $imageCorrect = move_uploaded_file($_FILES['imgUpload']['tmp_name'], $path . $imageName);

      if ($imageCorrect) {
        $pathImg = $path . $imageName;
      } else {
        echo "Falha ao enviar a imagem";
        exit;
      }
    }

    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $productDetail1 = $_POST['productDetail1'];
    $productDetail2 = $_POST['productDetail2'];
    $productDetail3 = $_POST['productDetail3'];

    $sqlUpdate = "UPDATE products SET product_name=?, product_detail1=?, product_detail2=?, product_detail3=?, product_image=? WHERE product_id = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("sssssi", $productName, $productDetail1, $productDetail2, $productDetail3, $pathImg, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      echo "Registro atualizado com sucesso";
      // header('location: controleDeProdutos.php');
    } else {
      echo "Falha na atualização";
    }
  }
}
?>