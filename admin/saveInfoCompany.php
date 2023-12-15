<?php
include_once('../db/connection.php');

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $mail = $_POST['mail'];
  $address = $_POST['address'];
  $whats = $_POST['whats'];
  $face = $_POST['face'];
  $insta = $_POST['insta'];

  $sql  = "SELECT * FROM `company`";
  $result = $conn->query($sql);
  $data = mysqli_fetch_assoc($result);

  $pathImg = $data['logo'];

  if (isset($_FILES['imgUpload']) && $_FILES['imgUpload']['error'] === 0) {
    $image = $_FILES['imgUpload'];

    $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $pathImg = "imagesUpload/" . $image['name'];

    if ($extension !== 'jpg' && $extension !== 'png') {
      die('Tipo de arquivo não aceito');
    } else {
      $imageCorrect = move_uploaded_file($image["tmp_name"], $pathImg);

      if (!$imageCorrect) {
        echo "Falha ao enviar a imagem";
        die();
      }
    }
  }

  $sqlUpdate = "UPDATE company SET name=?, tel=?, mail=?, address=?, whats=?, face=?, insta=?, logo=? WHERE id = ?";

  $stmt = $conn->prepare($sqlUpdate);
  $stmt->bind_param("sssssssis", $name, $tel, $mail, $address, $whats, $face, $insta, $pathImg, $id);

  if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
      echo "Registro atualizado com sucesso";
    } else {
      echo "Falha na atualização";
    }
  } else {
    echo "Falha na atualização";
  }
}

