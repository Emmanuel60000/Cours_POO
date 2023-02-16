<?php
include_once("../control/creationCTRL.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription.php</title>
</head>

<body>
    <div id="container">
        <form action="" method="post">
            <h1>Inscription</h1>
            <?php
            if (isset($message)) { ?>
                <p><?php echo $message ?></p>
            <?php } ?>

            <label for="">Email</label>
            <input type="email" name="email"><br><br>
            <?php
            if (isset($error["email"])) { ?>
                <p><?php echo $error["email"]; ?></p>
            <?php } ?>
            <?php if (isset($mailExiste)) { ?>
                <p><?= $mailExiste ?></p>
            <?php } ?>
            <label for="">Mot de passe</label>
            <input type="password" name="MotDepasse"><br><br>
            <?php
            if (isset($error["MotDepasse"])) { ?>
                <p><?php echo $error["MotDepasse"]; ?></p>
            <?php } ?>
            <label for="">Pseudo</label>
            <input type="text" name="pseudo"><br><br>
            <?php
            if (isset($error["pseudo"])) { ?>
                <p><?php echo $error["pseudo"]; ?></p>
            <?php } ?>
            <?php if (isset($pseudoExiste)) { ?>
                <p><?= $pseudoExiste ?></p>
            <?php } ?>
            <label for="">Ville</label>
            <select name="id_cities">
                <option value=" ">choix</option>
                <?php foreach ($ville as $key => $value) {
                ?>
                    <option value="<?= $value["id"] ?>"><?= $value["name"] ?></option>
                    <?php var_dump($value["name"])   ?>
                <?php    } ?>
            </select>
            <?php
            if (isset($error["id_cities"])) { ?>
                <p><?php echo $error["id_cities"]; ?></p>
            <?php } ?>
            <input type="submit" name="button" value="envoyer">
        </form>
    </div>


</body>

</html>