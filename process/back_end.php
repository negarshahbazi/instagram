
<?php
// session_start();
// $pseudo=$_SESSION['user'];
// var_dump($pseudo);
if(isset($_POST['postMyImage']) && isset($_FILES['srcMyPost'])) {
    session_start();
    var_dump($_FILES['srcMyPost']);
    // var_dump($pseudo);
    $errors = array();
    $file_name = basename($_FILES['srcMyPost']['name']);
    $file_size = $_FILES['srcMyPost']['size'];
    $file_tmp = $_FILES['srcMyPost']['tmp_name'];
    $file_type = $_FILES['srcMyPost']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['srcMyPost']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
       
        $resultat = move_uploaded_file($file_tmp, "../images/" . $file_name);
        echo "Success";
    } else {
        
        print_r($errors);
    }


header('Location: ../pages/profil.php');
}
// $request = $database->query("SELECT * FROM user WHERE pseudo=" . $pseudo);
// // $request->fetch
// if ($resultat) {
//     $request = $database->prepare('INSERT INTO post (src_photo) VALUES (:src_photo)');
//     $request->execute([
//         ' :src_photo' => $resultat,
//     ]);
//     //  header("Location: profil.php?id=".$pseudo);
//     //  header("Location: profil.php");
// }
?>
   

                     