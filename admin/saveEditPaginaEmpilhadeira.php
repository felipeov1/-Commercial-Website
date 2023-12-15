<?php
include_once('../db/connection.php');

if (isset($_POST["update"])) {
    if (isset($_FILES['imgUpload'])) {
        $image = $_FILES['imgUpload'];

        if ($image['error']) {
            die("Falha ao enviar arquivo");
        }

        $path = "imagesUpload/";

        $imageName = $image['name'];

        $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $pathImg = $path . $imageName;

        if ($extension != 'jpg' && $extension != 'png') {
            die('Tipo de arquivo não aceito');
        } else {
            $imageCorrect = move_uploaded_file($image["tmp_name"], $pathImg);
            if ($imageCorrect) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $smallText = $_POST['smallText'];

                $sqlUpdate = "UPDATE forklift_page SET title=?, smallText=?, img=?, pathImg=? WHERE id = ?";

                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("ssssi", $title, $smallText, $imageName, $pathImg, $id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "Registro atualizado com sucesso";
                } else {
                    echo "Falha na atualização";
                }
            } else {
                echo "Falha ao enviar a imagem";
            }
        }
    }
}
header("Location: editarPaginaEmpilhadeiras.php");
?>

