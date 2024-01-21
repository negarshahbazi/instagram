
<!-- <?php
session_start();
var_dump($_FILES['avatarFile']);
// Assuming '../images/' is your upload directory
$uploadDirectory = '../images/';
$uploadedFile = $uploadDirectory . basename($_FILES['avatarFile']['name']);

// Check if the file is an image
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$fileExtension = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));

if (!in_array($fileExtension, $allowedExtensions)) {
    echo json_encode(['success' => false]);
    exit();
}

// Move the uploaded file to the destination directory
if (move_uploaded_file($_FILES['avatarFile']['tmp_name'], $uploadedFile)) {
    // Update the user's avatar path in the database (replace this with your database logic)

    // Construct the new avatar URL
    $avatarUrl = '../images/' . basename($_FILES['avatarFile']['name']);

    echo json_encode(['success' => true, 'avatarUrl' => $avatarUrl]);
} else {
    echo json_encode(['success' => false]);
}
?> -->






