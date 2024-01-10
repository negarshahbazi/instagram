<?php
session_start();
require_once('./connexion.php');

$request = $database->prepare('SELECT * FROM post ');
$request->execute([]);
$post = $request->fetch();
// var_dump($like);
if (isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_POST['envoyerButton'])) {

        $request = $database->prepare('INSERT INTO comment (commentaire,user_id,post_id) VALUE (:commentaire,:user_id,:post_id)');
        $request->execute([
                ':commentaire' => $_POST['commentaire'],
                ':user_id' => $_SESSION['user']['id'],
                ':post_id' => $post['id'],

        ]);
        $comment = $request->fetch();
        var_dump($comment);
        $_SESSION['comment'] = $comment;
}

header('Location: ../pages/profil.php');
