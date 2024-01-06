<?php
  session_start();

require_once('../process/connexion.php');

//modification
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

    $request = $database->prepare("SELECT * FROM `user` WHERE pseudo = :pseudo");
    $request->execute(['pseudo' => $_POST['pseudo']]);
    $user = $request->fetch();


 

    if (!$user) {

        $requete = $database->prepare("INSERT INTO user (pseudo,src_avatar) 
                    VALUES (:pseudo,:src_avatar)");

        $result = $requete->execute([
            'pseudo' => $_POST['pseudo'],
            'src_avatar' => "Avatar-Profile-Vector-PNG-Pic.png",

        ]);

        $user = [
            'id' => $database->lastInsertId(),
            'pseudo' => $_POST['pseudo'],
            'src_avatar' => "Avatar-Profile-Vector-PNG-Pic.png",

        ];
      
        $_SESSION['user'] = $user;
    }
    // avatar code
    if (isset($_FILES['srcAvatar']) && isset($_POST['submit'])){
       
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
                'id' => $_SESSION['user']['id'],
                'src_avatar' => $file_name,
            ]);
            $user = [
                'id' => $database->lastInsertId(),
                'pseudo' => $_POST['pseudo'],
                'src_avatar' => $file_name,
    
            ];
            $_SESSION['user'] = $user;
        } else {

            print_r($errors);
        }
    }

}
// var_dump($avatar);


header('Location: ../pages/profil.php');
