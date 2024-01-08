
<?php
require_once('./process/connexion.php');


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./utils/style.css">
    <title>Document</title>
</head>
<body>
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
