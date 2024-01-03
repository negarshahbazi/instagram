<?php
session_start();
var_dump($_SESSION['srcMyPost']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>instagram</title>
    <link href="../utils/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form action="../process/back_end.php" method="post">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card m-5" style="width: 40rem;">
                <h4 class="text-center m-5">choisir votre photo:</h4>
                <div class="text-center m-5">
                    <img src="<?php echo $_SESSION['srcMyPost']?>" alt="">
                    <input class="" type="file" name="srcMyPost">
                </div>
                <div class="card-body text-center">
                    <p class="card-text text-center  "><button type="submit" name="postMyImage">Envoyer</button></p>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../utils/main.js"></script>
</body>

</html>