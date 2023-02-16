<?php
session_start();
include("../model/Utilisateurs.class.php");



$ajoue = new Utilisateurs();
if (isset($_POST["connexion"])) {
    $error = [];
    if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
        if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $mail = $_POST["mail"];
        } else {
            $error["mail"] = "Il faut renseigner un e-mail valide";
        }
    } else {
        $error["mail"] = "Le champ email est vide";
    }
    if (isset($_POST["pass"]) && !empty($_POST["pass"])) {
        if (mb_strlen($_POST["pass"]) >= 8) {
            $pass = $_POST["pass"];
        } else {
            $error["pass"] = "Le champ mot de passe doit avoir au moins 8 caractÃ¨res";
        }
    } else {
        $error["pass"] = "Le champ mot de passe est vide";
    }
    if (empty($error)) {
        echo"pass";
        $ajoue->setEmail($mail);
        $ajoue->setMotDepasse($pass);
          $a=    $ajoue->requete();
        // header("Location:profil.view.php");
        // var_dump($a);
        if ($a === false) {
            $profilInexistant = "Le profil n'existe pas";
        } else {
            if ($pass === $a["MotDepasse"]) {
                $_SESSION["id"] = $a["id"];
                $_SESSION["email"] = $a["email"];
                $_SESSION["id_citie"] = $a["id_citie"];
                $_SESSION["id_Roles"] = $a["id_Roles"];
                $_SESSION["pseudo"] = $a["pseudo"];


                header("Location:profil.view.php");
                exit();
            } else {
                $mauvaisMdp = "Le mot de passe n'est pas bon";
            }
        }
    }
}
?>
