<?php
include_once("../control/modificationCTRL.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page de modification</title>
</head>

<body>
    <div id="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Modifier</h1>

            <label for="mail">Adresse e-mail</label>
            <input type="email" name="mail" id="mail" value="<?= $infosUser["email"]  ?>" />
            <?php if (isset($error["mail"])) { ?>
                <p><?= $error["mail"] ?></p>
            <?php } ?>
            <?php if (isset($mailExiste)) { ?>
                <p><?= $mailExiste ?></p>
            <?php } ?>


            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?= $infosUser["pseudo"]  ?>" />
            <?php if (isset($error["pseudo"])) { ?>
                <p><?= $error["pseudo"] ?></p>
            <?php } ?>
            <?php if (isset($pseudoExiste)) { ?>
                <p><?= $pseudoExiste ?></p>
            <?php } ?>


            <label for="pass">Ancien mot de passe</label>
            <input type="password" name="pass" id="pass" />
            <?php if (isset($error["pass"])) { ?>
                <p><?= $error["pass"] ?></p>
            <?php } ?>
            <br>

            <label for="NouvPnass">Nouveau mot de passe</label>
            <input type="password" name="NouvPnass" id="NouvPnass" />
            <?php if (isset($error["NouvPnass"])) { ?>
                <p><?= $error["NouvPnass"] ?></p>
            <?php } ?>
            <br>
            <label for="image">Image de profil</label>
            <input type="file" name="image" id="image" />
            <?php if (isset($error["image"])) { ?>
                <p><?= $error["image"] ?></p>
            <?php } ?>


            <label for="ville">Votre ville</label>
            <input type="text" name="ville" id="ville" value="<?= $infosUser["name"]  ?>" />
            <?php if (isset($error["ville"])) { ?>
                <p><?= $error["ville"] ?></p>
            <?php } ?>


            <input type="submit" name="modifier" value="Modifier" />
        </form>
    </div>
</body>

</html>