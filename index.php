<?php
require_once('./process/connexion.php');
include_once('./partiel/header.php');

session_start();
?>

<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
    <section class="container md pt-5 mr-0 ml-0 d-flex align-items-center justify-content-center">

    <section  class="container md pt-5 mr-0 ml-0 d-flex align-items-center justify-content-center" id="">

        <form action="./process/verif_login.php" method="post">
            <div id="bg-pseudo" class="card-body d-flex align-items-center justify-content-center" style="width: 40rem; height: 31rem;">
                <div id="bouton" class="d-flex justify-content-end">
                    <input type="text" class="form-control w-50 opacity-75" id="pseudo" name="pseudo">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </section>


<script src="../utils/main.js" ></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>
