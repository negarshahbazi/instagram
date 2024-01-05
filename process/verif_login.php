<?php
require_once('./process/connexion.php');
//var_dump($_POST);


if (

    isset($_POST['pseudo']) && !empty($_POST['pseudo'])

) {
    $request = $database->query("SELECT * FROM `user` WHERE pseudo ='" . $_POST['pseudo'] . "'");
    // Select * FROM user WHERE pseudo = 'Anthony'
    $user = $request->fetch();
   
    if ($user === false) {
        $statistique = 0;
        $requete = $database->prepare("INSERT INTO user (stat, pseudo) 
                    VALUES (:stat, :pseudo)");

        $result = $requete->execute([
            'stat' => $statistique,
            'pseudo' => $_POST['pseudo']

        ]);

        $user = [
            'id' => $database->lastInsertId(),
            'pseudo' => $_POST['pseudo'],
            
        ];
    }

    //var_dump($user);
    session_start();
    $_SESSION['user'] = $user;
// var_dump($_SESSION['user']);
}
//die();
//var_dump($_POST);
header('Location: ../index.php');