<?php
session_start();
include_once("../model/Utilisateurs.class.php");

// $tab = ["profil.php", "connexion.php"];
$ajoue = new Utilisateurs();
//Affichage des informations de l'utilisateur
if (isset($_GET["value"]) && !empty($_GET["value"])) {

    $id = (int)$_GET["value"];
    if (is_int($id)) {

        $ajoue->setId($id);
        $infosUser = $ajoue->select();
    } else {
        header("Location:../view/404.php");
    }
} else {
    header("Location:../view/404.php");
}
//Le traitement du formulaire de modification
if (isset($_POST["modifier"])) {
    $error = [];
    $path = "";
    $imageUser = null;

    if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
        if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $mail = $_POST["mail"];
        } else {
            $error["mail"] = "Il faut renseigner un e-mail valide";
        }
    } else {
        $error["mail"] = "Le champ email est vide";
    }

    if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) {
        $pseudo = $_POST["pseudo"];
    } else {
        $error['pseudo'] = "Le pseudo est manquant";
    }
    if (isset($_POST["pass"]) && !empty($_POST["pass"])) {
        if ($_POST["pass"] === $infosUser["MotDepasse"]) {
            if (isset($_POST["NouvPnass"]) && !empty($_POST["NouvPnass"])) {
                if (mb_strlen($_POST["pass"]) >= 8) {
                    $pass = $_POST["NouvPnass"];
                } else {
                    $error["pass"] = "Le champ mot de passe doit avoir au moins 8 caractères";
                }
            } else {
                $pass = $_POST["pass"];
            }
        } else {
            $error["pass"] = "Le mot de passe n'est pas bon";
        }
    } else {
        $error["pass"] = "Le champ mot de passe est vide";
    }
    if (isset($_POST["ville"]) && !empty($_POST["ville"])) {
        $id_citie = $_POST["ville"];
        $ajoue->setName($id_citie);
        $citie = $ajoue->ville();
        if ($citie !== false) {
            $ville2 = $citie["id"];
        } else {
            $error["ville"] = "Rentrez le bon nom de la ville";
        }
    } else {
        $error["ville"] = "Le champ ville est vide";
    }


    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $image = $_FILES["image"]["name"];
        $img = strrchr($image, '.');
        $extension = strtolower(substr($img, 1));
        // var_dump($extension);
        $tabExtension = ['jpg', 'jpeg', 'gif', 'png'];
        if (in_array($extension, $tabExtension)) {
            $imageUser = $infosUser["pseudo"] . "." . $extension;
            // var_dump($imageUser);
            $path = '../control/photos/' . $imageUser;
        } else {
            $error["image"] = "L'image doit être au format 'jpg', 'jpeg', 'gif', 'png'";
        }
    } else {
        if ($infosUser["avatar"] !== null) {
            $imageUser = $infosUser["avatar"];
            // var_dump($imageUser);
        }
    }

    if (empty($error)) {

        $ajoue->setId($_SESSION["id"]);
        $ajoue->setEmail($mail);
        $ajoue->setPseudo($pseudo);
        $verifUserMail =   $ajoue->mail();
        $verifUserPseudo = $ajoue->pseudo();

        if ($verifUserMail != false && $verifUserMail["id"] != $_SESSION["id"]) {
            $mailExiste = "L'email est déjà utilisé.";
        } elseif ($verifUserPseudo != false && $verifUserPseudo["id"] != $_SESSION["id"]) {
            $pseudoExiste = "Le nom d'utilisateur est déjà utilisé.";
        } else {
            $ajoue->setEmail($mail);
            $ajoue->setMotDepasse($pass);
            $ajoue->setPseudo($pseudo);
            $ajoue->setId_citie($ville2);
            $ajoue->setAvatar($imageUser);
          
            var_dump($ajoue->getAvatar());
            $register = $ajoue->register();
            // header("Location:profil.view.php");
            // var_dump($register);
            if ($register) {
                if (!empty($ajoue->getAvatar())) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $path);
                }
                $message = "Le profil a bien été modifié";
                echo $message;
                header("Location:modification.view.php?value=" . $_SESSION["id"] . "&message=" . $message);
            } else {
                $message = "Une erreur s'est produite lors de l'inscription.";
                echo $message;
                header("Location:modification.view.php?value=" . $_SESSION["id"] . "&message=" . $message);
            }
        }
    }
}
