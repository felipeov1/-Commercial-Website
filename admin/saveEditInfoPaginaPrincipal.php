<?php
include_once('../db/connection.php');

if (isset($_POST["update"])) {
    if (isset($_FILES['imgUpload1']) || isset($_FILES['imgUpload2']) || isset($_FILES['imgUpload3'])) {

        function uploadImage($file, $originalImage)
        {
            $path = "imagesUpload/";
            $imageName = $file['name'];
            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (!empty($originalImage) && empty($imageName)) {
                return $originalImage; 
            } else {
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    die('Tipo de arquivo não aceito');
                }

                $imageCorrect = move_uploaded_file($file['tmp_name'], $path . $imageName);

                if ($imageCorrect) {
                    return $path . $imageName; 
                } else {
                    echo "Falha ao enviar a imagem";
                    exit;
                }
            }
        }

        $id = $_POST['id'];
        $exploreSectionText = $_POST['exploreSectionText'];
        $cardName = $_POST['cardName'];

        $pathImg1 = uploadImage($_FILES['imgUpload1'], $_POST['originalImgName1']);
        $pathImg2 = uploadImage($_FILES['imgUpload2'], $_POST['originalImgName2']);
        $pathImg3 = uploadImage($_FILES['imgUpload3'], $_POST['originalImgName3']);
        $pathImg4 = uploadImage($_FILES['imgUpload4'], $_POST['originalImgName4']);
        $pathImg5 = uploadImage($_FILES['imgUpload5'], $_POST['originalImgName5']);

        $sqlUpdate = "UPDATE main_page SET exploreSectionText=?, cardName=?, banner1=?, banner2=?, banner3=?, cardImg=?, missionImg=? WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("sssssssi", $exploreSectionText, $cardName, $pathImg1, $pathImg2, $pathImg3, $pathImg4, $pathImg5, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Registro atualizado com sucesso";
            header('location: editarPaginaPrincipal.php');
        } else {
            echo "Falha na atualização";
        }
    }
}
?>