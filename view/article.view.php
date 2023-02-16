<?php
include_once("../control/articleCtrl.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>article</title>
</head>

<body>
    <div id="container">

        <form action="" method="post">
            <h1>Articles</h1>
           
            <textarea name="article" id="" cols="50" rows="10"></textarea>
            <?php if (isset($error["article"])) { ?>
                <p><?= $error["article"] ?></p>
            <?php } ?>
            <input type="submit" name="submit" value="valider">

        </form>
    </div>

</body>

</html>