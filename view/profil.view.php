<?php
include_once("../control/profilCTRL.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<header>


    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h2 class="text-white h4">Accueil</h2>
            <h6><a href="creation.view.php" class="text-decoration-none ">Inscription</a></h6>
            <h6><a href="connexion.view.php" class="text-decoration-none">Connexion</a></h6>
            <h6><a href="article.view.php" class="text-decoration-none">Articles</a></h6>
            <a href=""></a>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<body>


    <div id="container">
        <h2>Page de Profil</h2>
        <p>votre Pseudo : <?= $_SESSION["pseudo"]  ?></p>
        <p>votre Mail : <?= $_SESSION["email"] ?></p>

        <form action="" method="post" enctype="multipart/form-data">
            <h1>Profil</h1>
            <p>Voulez-vous vous déconnecter?
                <input type="submit" name="deconnexion" value="Se déconnecter" />
            </p>
            <p>Voulez-vous modifier vos informations?
                <input type="submit" name="modifier" value="modifier" />
            </p>
            <p>Souhaitez-vous désactiver votre compte?
                <input type="submit" name="desactivation" value="Désactiver" />
            </p>
            <p>Souhaitez-vous supprimer votre compte?
                <input type="submit" name="delete" value="supprimer" />
            </p>
        </form>
    </div>


</body>

</html>