<?php
session_start();
include("../model/Utilisateurs.class.php");
if (isset($_SESSION["id"])) {

    $ajoue = new Utilisateurs();
    
    if (isset($_POST["deconnexion"])) {
        session_destroy();
        header("Location:connexion.view.php");
    }
    if (isset($_POST["modifier"])) {
        header("Location:modification.view.php?value=" . $_SESSION["id"]);
    }
    if (isset($_POST["delete"])) {
        $ajoue->setId($_SESSION["id"]);
        $ajoue->delete();
        session_destroy();
        header("Location:creation.view.php");
    }
    // if (isset($_POST["desactivation"])) {
        // $ajoue->setId($_SESSION["id"]);
        // $ajoue->desactivation();
    //     $connexion->query("UPDATE utilisateurs SET active = 0 WHERE id =" . $_SESSION["id"]);
    //     session_destroy();
    //     header("Location:connexion.php");
    // }
} else {
    header("location:connexion.php");
}
