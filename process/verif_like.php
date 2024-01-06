<?php
session_start();
// var_dump($_SESSION['user']['id']);
require_once('./connexion.php');
$request = $database->prepare('SELECT * FROM post  WHERE user_id=:user_id');
$request->execute([
    ':user_id'=> $_SESSION['user']['id'],
]);
$like=$request->fetch();
var_dump($like);
$count=0;
if(isset($_POST['like'])){
    $count+=1;
    $request = $database->prepare('UPDATE favorite SET count = :count WHERE user_id = :user_id AND post_id = :post_id');
    $updateResult=$request->execute([
        ':user_id'=> $_SESSION['user']['id'],
        ':post_id' => $like['id'],
        ':count'=>$count,
    ]);
    if ($updateResult) {
        echo "Like updated successfully!";
    } else {
        echo "Error updating like!";
    }
}


header('Location: ../pages/profil.php');


?>