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
        $title = $_POST['title'];
        $smallText = $_POST['smallText'];


        $sqlUpdate = "UPDATE about_page SET img=?, smallText=?, title=? WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("sssi", $pathImg, $smallText, $title, $id);
        $stmt->execute();



        if ($stmt->affected_rows > 0) {
            echo "Registro atualizado com sucesso";
            header('location: editarPaginaSobre.php');

        } else {
            echo "Falha na atualização";
        }
    }
}
?>