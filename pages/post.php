<?php
session_start();
// var_dump($_SESSION['srcMyPost']);
?>

<?php require_once('../partiel/header.php')?>
    <form action="../process/back_end.php" method="post"  role="form" id="contact_form" class="contact-form" enctype="multipart/form-data">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card m-5" style="width: 40rem;">
                <h4 class="text-center m-5">choisir votre photo:</h4>
                <div class="text-center m-5">
                    <img src="" alt="">
                    <!-- aller vers back_end ici  -->
                    <input class="" type="file" name="srcMyPost">
                </div>
                <div class="card-body text-center">
                    <p class="card-text text-center  ">
                        <button type="submit" name="postMyImage" value="Upload Image">Envoyer</button></p>
                </div>
            </div>
        </div>
    </form>
    <?php require_once('../partiel/footer.php')?>