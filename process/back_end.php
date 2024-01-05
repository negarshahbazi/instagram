
<?php
session_start();
if(isset($_POST['postMyImage']) && isset($_FILES['srcMyPost'])) {

    $errors = array();
    $file_name = basename($_FILES['srcMyPost']['name']);
    $file_size = $_FILES['srcMyPost']['size'];
    $file_tmp = $_FILES['srcMyPost']['tmp_name'];
    $file_type = $_FILES['srcMyPost']['type'];
    $file_name_parts = explode('.', $_FILES['srcMyPost']['name']);
    $file_ext = strtolower(end($file_name_parts));
    // $file_ext = strtolower(end(explode('.', $_FILES['srcMyPost']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    
    if (empty($errors) == true) {
        
        $resultat = move_uploaded_file($file_tmp , "../images/" . $file_name);
        
        require_once('./connexion.php');
            $request = $database->prepare('INSERT INTO post (user_id, src_photo) VALUES (:user_id, :src_photo)');
            $person=$request->execute([
                ':user_id'=> $_SESSION['user']['id'],
                ':src_photo' => $file_name,
            ]);

            
    // var_dump($person);
    } else {
        
        print_r($errors);
    }

header('Location: ../pages/profil.php');

}
 

?>