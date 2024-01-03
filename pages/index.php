<?php
require_once('../process/connexion.php');
include_once('../partiel/header.php');
session_start();

?>
 <?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
            <section class="container md pt-5 mr-0 ml-0">
                <form action="./bdd/pseudo.php" method="post">
                    <div id="bg-pseudo" class="card-body d-flex align-items-center justify-content-center" style="width: 40rem; height: 31rem;">
                        <div id="bouton" class="d-flex justify-content-end">
                           
                            <input type="text" class="form-control w-50 opacity-75" id="pseudo" name="pseudo">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
            </section>
        <?php } ?>






<?php
include_once('../partiel/footer.php');
?>