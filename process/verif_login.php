<?php
  session_start();

require_once('../process/connexion.php');

//modification
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

    $request = $database->prepare("SELECT * FROM `user` WHERE pseudo = :pseudo");
    $request->execute(['pseudo' => $_POST['pseudo']]);
    $user = $request->fetch();
    $_SESSION['user'] = $user;

 

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
 
// var_dump( $user);


header('Location: ../pages/profil.php');
}