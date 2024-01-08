<?php
session_start();

require_once('./connexion.php');

// Récupérer la publication associée à l'utilisateur
$request = $database->prepare('SELECT * FROM post WHERE user_id=:user_id');
$request->execute([
    ':user_id'=> $_SESSION['user']['id'],
]);
$like = $request->fetch();

// Vérifier si l'utilisateur a déjà aimé cette publication
$request = $database->prepare('SELECT * FROM favorite WHERE user_id=:user_id AND post_id=:post_id');
$request->execute([
    ':user_id'=> $_SESSION['user']['id'],
    ':post_id'=> $like['id'],
]);
$existingLike = $request->fetch();

if(isset($_POST['like'])){
    if($existingLike){
        // Si l'utilisateur a déjà aimé la publication, retirer le like
        $request = $database->prepare('DELETE FROM favorite WHERE user_id=:user_id AND post_id=:post_id');
        $request->execute([
            ':user_id'=> $_SESSION['user']['id'],
            ':post_id'=> $like['id'],
        ]);

        // Réduire le compteur
        $_SESSION['countHeart'] -= 1;

        echo "Like removed successfully!";
    } else {
        // Si l'utilisateur n'a pas encore aimé la publication, ajouter le like
        $count = 0;
        $request = $database->prepare('INSERT INTO favorite (user_id, post_id, count) VALUES (:user_id, :post_id, :count)');
        $request->execute([
            ':user_id'=> $_SESSION['user']['id'],
            ':post_id'=> $like['id'],
            ':count'=> $count,
        ]);

        // Incrémenter le compteur
        $count += 1;

        echo "Like added successfully!";
    }

    // Mettre à jour le compteur dans la session
    $_SESSION['countHeart'] = $count;
}

var_dump($_SESSION['countHeart']);
header('Location: ../pages/profil.php');
