<?php
session_start();



// avatar code
    if (isset($_FILES['srcAvatar'])){
        
  

        $errors = array();
        $file_name = basename($_FILES['srcAvatar']['name']);
        $file_size = $_FILES['srcAvatar']['size'];
        $file_tmp = $_FILES['srcAvatar']['tmp_name'];
        $file_type = $_FILES['srcAvatar']['type'];
        $file_name_parts = explode('.', $_FILES['srcAvatar']['name']);
        $file_ext = strtolower(end($file_name_parts));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {

            $resultat = move_uploaded_file($file_tmp, "../images/" . $file_name);
        
            require_once('./connexion.php');
            $requete = $database->prepare("UPDATE user SET src_avatar = :src_avatar WHERE id = :id");
            $result = $requete->execute([
                'src_avatar' => $file_name,
                'id' => $_SESSION['user']['id'],
            ]);
            $changeavatar = [
                'id' => $database->lastInsertId(),
                'src_avatar' => $file_name,
    
            ];
    
           
        } else {

            print_r($errors);
        }
    }

header('Location: ../pages/profil.php');
?>