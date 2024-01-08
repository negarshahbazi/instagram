<?php
session_start();
// var_dump($_SESSION);
// var_dump($_SESSION['user']['src_avatar']);
require_once('../process/connexion.php');


$request = $database->prepare("SELECT * FROM post WHERE user_id = :user_id LIMIT 6");
$request = $database->prepare("SELECT * FROM post WHERE user_id = :user_id ");
$request->execute([':user_id' => $_SESSION['user']['id']]);
$posts = $request->fetchAll();

$request = $database->prepare("SELECT * FROM user WHERE pseudo = :pseudo ");
$request->execute([':pseudo' => $_SESSION['user']['pseudo']]);
$user = $request->fetch();
// var_dump($user);
?>
<?php require_once('../partiel/header.php') ?>
<!-- header -->
<section class="container" id="profil">
    <div class="container myHead ">
        <div class="row mt-2  d-flex justify-content-center align-items-center">
            <form action="../process/back_end.php" method="post" class="d-flex justify-content-center align-items-center ">
                <div class="col-2 d-flex flex-column align-items-center btn-secondary">
                    <!-- avatar -->
                    <img src="<?php echo "../images/" . $user['src_avatar'] ?>" alt="" class="m-2 border rounded-pill w-50 h-50  ">
                    <button type="button" class="btn bg-secondary-subtle" data-toggle="modal" id="avatar" data-target="#avatarModal">Modifier</button>
                </div>
                <div class="col-8 btn-secondary">
                    <input type="text" class="" name="pseudo" value=" <?php echo $_SESSION['user']['pseudo'] ?>">
                    <a href="./post.php" class="btn bg-secondary-subtle">post</a>
                    <button type="submit" name="search" class="btn bg-secondary-subtle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                            <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                        </svg>

                </div>
                <div class="col-2 d-flex justify-content-end"><svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg></div>
        </div>
        <!-- photos in profile -->
        <section class="myPhotos container">
            <div class="row d-flex justify-content-center align-items-center">
                <?php foreach ($posts as $post) : ?>
                    <div class="col-lg-4">
                        <img class="border-myImage pt-5 myPost" src="<?php echo "../images/" . $post['src_photo'] ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
       
        <!--modal post Add this to the end of your HTML body -->
 <section>      
        <form action="../process/verif_like.php" method="post" enctype="multipart/form-data">
            <div class="modal" id="photoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Photo Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" class="img-fluid" alt="Modal Image">
                        </div>

                        <!-- like -->

                        <div class="m-3 d-flex flex-column align-items-start"><button type="submit" class="btn hover" name="like" id="like"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-heart m-3  favorite" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                </svg><button name="countLike" class="w-25 bg-secondary-subtle border  btn rounded-pill shadow hover border-secondary"><?php echo $_SESSION['countHeatr'] ?></button></button></div>
                        <!-- commentaire -->

                        <form action="../process/verif_commentaire.php" method="post">
                            <div class="btn-group m-4 btn-secondary bg-secondary-subtle ">
                                <input type="text" name="commentaire" value="">
                                <button type="submit" class="btn border-secondary" name="envoyerButton">Envoyer</button>
                                <button type="submit" class="btn border border-secondary" name="toutMessages" data-toggle="modal" id="comment" data-target="#commentModal">Tout messages</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>

        <!-- modal avatar Add this to the end of your HTML body -->
        <form action="../process/verif_login.php" method="post" enctype="multipart/form-data">
            <div class="modal" id="avatarModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">choisir votre photo:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" class="srcAvatar" name="srcAvatar">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  -->
        <!-- modal comment Add this to the end of your HTML body -->
        <form action="../process/verif_commentaire.php" method="post" enctype="multipart/form-data">
            <div class="modal" id="commentModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Afficher tout les messages:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="" name="comment">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="sendComment" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  -->
</section>
</form>

<?php require_once('../partiel/footer.php') ?>