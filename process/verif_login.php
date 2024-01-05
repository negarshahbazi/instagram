<?php
require_once('../process/connexion.php');

//modification
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    $request = $database->prepare("SELECT * FROM `user` WHERE pseudo = :pseudo");
    $request->execute(['pseudo' => $_POST['pseudo']]);
    $user = $request->fetch();

    if (!$user) {
       
        $requete = $database->prepare("INSERT INTO user (pseudo) 
                    VALUES (:pseudo)");

        $result = $requete->execute([
            'pseudo' => $_POST['pseudo'],
        
        ]);

        $user = [
            'id' => $database->lastInsertId(),
            'pseudo' => $_POST['pseudo'],
            
       
        ];
    }

    session_start();
   $_SESSION['user'] = $user;
  
}

header('Location: ../pages/profil.php');
?>