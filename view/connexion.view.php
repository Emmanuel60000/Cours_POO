<?php
include_once("../control/connexionCTRL.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page de connexion</title>
</head>

<body>

    <div id="container">
        <form action="" method="post">
            <h1>Connexion</h1>

            <label for="mail">Adresse e-mail</label>
            <input type="email" name="mail" />
            <?php if (isset($error["mail"])) { ?>
                <p><?= $error["mail"] ?></p>
            <?php } ?>
            <?php if (isset($profilInexistant)) { ?>
                <p><?= $profilInexistant ?></p>
            <?php } ?>


            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" />
            <?php if (isset($error["pass"])) { ?>
                <p><?= $error["pass"] ?></p>
            <?php } ?>
            <?php if (isset($mauvaisMdp)) { ?>
                <p><?= $mauvaisMdp ?></p>
            <?php } ?>

            <input type="submit" name="connexion" value="Se connecter" />
        </form>
    </div>



</body>

</html>