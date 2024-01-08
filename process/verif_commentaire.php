<?php
session_start();
require_once('./connexion.php');
$request = $database->prepare('SELECT * FROM favorite  WHERE user_id=:user_id');
$request->execute([
    ':user_id'=> $_SESSION['user']['id'],
]);
$like=$request->fetch();
// var_dump($like);
if(isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_POST['envoyerButton'])){

    $request = $database->prepare('INSERT INTO comment (commentaire,user_id,post_id) VALUE (:commentaire,:user_id,:post_id)');
  $request->execute([
        ':commentaire'=>$_POST['commentaire'],
        ':user_id'=> $like['user_id'],
        ':post_id'=> $like['post_id'],
      
    ]);
    $comment=$request->fetch();
    var_dump($comment);
    $_SESSION['comment']=$comment;
}

header('Location: ../pages/profil.php');
?>