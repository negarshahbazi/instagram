
<?php
session_start();

if(isset($_POST['postMyImage'])) {
    
    var_dump($_FILES['srcMyPost']);
    $errors = array();
    $file_name = $_FILES['srcMyPost']['name'];
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
       
        $resultat = move_uploaded_file($file_tmp, "images/" . $file_name);
        echo "Success";
    } else {
        
        print_r($errors);
    }


require_once('./connexion.php');
}
// $request = $database->query("SELECT * FROM user WHERE pseudo=" . $_SESSION['pseudo']);
// // $request->fetch
// if ($resultat) {
//     $request = $database->prepare('INSERT INTO post (src_photo) VALUES (:src_photo)');
//     $request->execute([
//         ' :src_photo' => $resultat,
//     ]);
//     //  header("Location: profil.php?id=".$_SESSION['id']);
//     //  header("Location: profil.php");
// }
?>
   

                     