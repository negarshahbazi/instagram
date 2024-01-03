<?php
session_start();
if(isset($_POST['srcMyPost']) && !empty($_POST['srcMyPost']) && isset($_POST['postMyImage'])){
    $_SESSION['srcMyPost']=$_POST['srcMyPost'];
   
header('Location: ../pages/post.php');
}

?>

