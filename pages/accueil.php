<?php
require_once('../process/connexion.php');
session_start();


// var_dump($_SESSION['user']);
//récupère la photo du profil ........................................................
$result = $database->prepare("SELECT src_avatar FROM user WHERE id = :id");
$result->execute(['id' => $_SESSION['user']['id']]);
$avatar = $result->fetch();
// var_dump($avatar);
//.................................................................................
$request = $database->prepare("SELECT * FROM post ");
$request->execute([]);
$post = $request->fetch();
// var_dump($post);

$request = $database->prepare("SELECT * FROM user WHERE id = :id ");
$request->execute([':id' => $_SESSION['user']['id']]);
$user = $request->fetch();
// var_dump($user);
// fetch la table de comment
$request = $database->prepare("SELECT * FROM comment ORDER BY id DESC");
$request->execute();
$toutMessages = $request->fetchAll();

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../utils/style.css">
    <title>Document</title>
</head>

<body class="body-accueil">


    <div class="accueil">
        <section>
            <div class="container vh-100">
                <div class="row">
                    <div class="d-flex justify-content-between pt-5">
                        <h2>Accueil</h2>

                        <div id="image-accueil">
                            <a href="./profil.php">
                                <input type="image" name="avatar" src="<?php echo "../images/" . $avatar['src_avatar'] ?>" alt="" width="100" height="100" class="m-2 border rounded-pill">
                            </a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php
                        $result = $database->query("SELECT src_photo FROM post ORDER BY id DESC");

                        $result->execute();
                        $pictures = $result->fetchAll();
                        foreach ($pictures as $picture) : ?>
                            <div class="col-lg-4">
                                <img class="border-myImage pt-5 myPost" src="<?php echo "../images/" . $picture['src_photo'] ?>" alt="">

                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <section>
                <!-- modale post -->
                <form action="../process/verif_like.php" method="post" enctype="multipart/form-data">
                    <div class="modal" id="photoModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Photo Detail</h5>
                                    <button onclick="closeImage()" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img id="modalImage" class="img-fluid" alt="Modal Image">
                                </div>
                                <!-- like -->


                                <div class="m-3 d-flex flex-column align-items-start"><button type="submit" class="btn hover" name="like" id="like"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-heart m-3  favorite" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                        </svg><button name="countLike" class="w-25 bg-secondary-subtle border  btn rounded-pill shadow hover border-secondary"><?php echo $_SESSION['countHeart'] ?></button></button></div>
                                <!-- commentaire -->
                </form>
                <form action="../process/verif_commentaire.php" method="post">
                    <div class="btn-group m-4 btn-secondary bg-secondary-subtle ">
                        <input type="text" name="commentaire" value="" placeholder="commentaire...">
                        <button type="submit" class="btn border-secondary" name="envoyerButton">Envoyer</button>
                        <button type="submit" class="btn border border-secondary" name="toutMessages" data-toggle="modal" id="comment" data-target="#commentModal">Tout messages</button>
                    </div>
                    <div>
                        <ul>
                            <?php foreach ($toutMessages as $toutMessage) { ?>
                                <li>
                                    <?php echo $toutMessage['commentaire'] . '<hr>'  ?>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </form>
    </div>
    </div>
    </div>
    </form>

    </section>

    <div id="scroll_to_top">
        <a href="#top"><img src="../images/40369.svg" alt="Retourner en haut" /></a>
    </div>

    </section>

    </div>
    <script src="../utils/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>