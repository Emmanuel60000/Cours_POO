<?php
session_start();
include_once("../model/article.php");
if (isset($_SESSION["id"])) {
    $ajoue = new Article();
    if (isset($_POST["submit"])) {
        $erreur = [];

        if (isset($_POST["article"]) && !empty($_POST["article"])) {
            $article = $_POST["article"];
        } else {

            $erreur['article'] = "Veuillez renseigner le champ ";
        }

        if (empty($erreur)) {

            $ajoue->setTextes($article);
            $ajoue->setId_utilisateurs($_SESSION["id"]);
            $ajoue->requete();
            header("Location:../view/profil.view.php");
        }
    }
} else {
    header("location:../connexion.view.php");
}
