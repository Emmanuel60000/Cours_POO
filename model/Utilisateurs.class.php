<?php


class Utilisateurs
{
    private $id;
    private $email;
    private $MotDepasse;
    private $pseudo;
    private $id_citie;
    private $id_Roles;
    private $avatar = "";
    private $name;


    const HOST = "localhost";
    const DBNAME = "blogville";
    const LOGIN = "root";
    const PASSWORD = "";
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }
    public function getMotDepasse()
    {
        return $this->MotDepasse;
    }
    public function setMotDepasse($MotDepasse)
    {
        return $this->MotDepasse = $MotDepasse;
    }
    public function getpseudo()
    {
        return $this->pseudo;
    }
    public function setpseudo($pseudo)
    {
        return $this->pseudo = $pseudo;
    }
    public function getId_citie()
    {
        return $this->id_citie;
    }
    public function setId_citie($id_citie)
    {
        return $this->id_citie = $id_citie;
    }
    public function getId_Roles()
    {
        return $this->id_Roles;
    }
    public function setId_id_Roles($id_id_Roles)
    {
        return $this->id_Roles = $id_id_Roles;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function setAvatar($avatar)
    {
        return $this->avatar = $avatar;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }


// se connecter a la base de données
    private function connecter()
    {

        $pdo = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::LOGIN, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
// selectionner la base de données
    public function select()
    {
        $infosUsers = $this->connecter()->prepare("SELECT `utilisateurs`.`id`, `email`, `name`, `MotDepasse`, `pseudo`, `id_Roles`, `avatar` 
    FROM `utilisateurs` 
    INNER JOIN `cities` 
    ON `utilisateurs`.`id_citie` = `cities`.`id`
    WHERE `utilisateurs`.`id` =?");
        $infosUsers->bindValue(1, $this->id, PDO::PARAM_INT);

        $infosUsers->execute();

        return $infosUsers->fetch(PDO::FETCH_ASSOC);
    }
    // methode pour se connecter via l'email
    public function requete()
    {
        $infosUser = $this->connecter()->prepare("SELECT `id`, `email`, `MotDepasse`, `pseudo`, `id_citie`, `id_Roles` FROM `utilisateurs` WHERE email = ?");

        $infosUser->bindValue(1, $this->email, PDO::PARAM_STR);

        $infosUser->execute();
        return $infosUser->fetch(PDO::FETCH_ASSOC);
    }
// methode pour  la ville
    public function ville()
    {
        $villeUser = $this->connecter()->prepare("SELECT `id` FROM `cities` WHERE `name` =?");
        $villeUser->bindValue(1, $this->name, PDO::PARAM_STR);
        $villeUser->execute();
        return $villeUser->fetch(PDO::FETCH_ASSOC);
    }
    // methode verif email
    public function mail()
    {
        $mailVerif = $this->connecter()->prepare("SELECT id,`email`, `pseudo` FROM `utilisateurs` WHERE email=?");
        $mailVerif->bindValue(1, $this->email, PDO::PARAM_STR);
        $mailVerif->execute();
        return $mailVerif->fetch(PDO::FETCH_ASSOC);
    }
    // methode verif pseudo
    public function pseudo()
    {
        $pseudoVerif = $this->connecter()->prepare("SELECT id,`email`, `pseudo` FROM `utilisateurs` WHERE pseudo=?");
        $pseudoVerif->bindValue(1, $this->pseudo, PDO::PARAM_STR);
        $pseudoVerif->execute();
        return $pseudoVerif->fetch(PDO::FETCH_ASSOC);
    }
    // methode pour creer un compte
    public function register()
    {
        $register = $this->connecter()->prepare("UPDATE `utilisateurs` SET `email` = ?, `MotDepasse` = ?, `pseudo` = ?, `id_citie` = ?, `avatar`= ? WHERE id = ?");
        $register->bindValue(1, $this->email, PDO::PARAM_STR);
        $register->bindValue(2, $this->MotDepasse, PDO::PARAM_STR);
        $register->bindValue(3, $this->pseudo, PDO::PARAM_STR);
        $register->bindValue(4, $this->id_citie, PDO::PARAM_INT);
        $register->bindValue(5, $this->avatar, PDO::PARAM_STR);
        $register->bindValue(6, $this->id, PDO::PARAM_INT);
        return   $register->execute();
    }
    // methode pour supprimer un compte
    public function delete()
    {
        $delete = $this->connecter()->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $delete->bindValue(1, $this->id, PDO::PARAM_STR);
        $delete->execute();
    }
    // methode pour selectionner une ville
    public function choixVille()
    {
        $id = $this->connecter()->query("SELECT id,name  FROM `cities` where id = 1456 or id = 2889 
      or id = 3784 or id = 4547 or id = 5654");
        return $id->fetchAll(PDO::FETCH_ASSOC);
    }
// methode verif email pseudo
    public function verif()
    {
        $nbuser = $this->connecter()->prepare("SELECT email,pseudo FROM utilisateurs  WHERE email = ? OR pseudo = ?");

        $nbuser->bindValue(1, $this->email, PDO::PARAM_STR);
        $nbuser->bindValue(2, $this->pseudo, PDO::PARAM_STR);
        $nbuser->execute();
        return $nbuser->fetch(PDO::FETCH_ASSOC);
    }
    // methode pour inserer
    public function insert()
    {
        $insertion = $this->connecter()->prepare("INSERT INTO utilisateurs(email,MotDepasse,pseudo,id_citie)
      VALUES(?,?,?,?) ");
        $insertion->bindValue(1, $this->email, PDO::PARAM_STR);
        $insertion->bindValue(2, $this->MotDepasse, PDO::PARAM_STR);
        $insertion->bindValue(3, $this->pseudo, PDO::PARAM_STR);
        $insertion->bindValue(4, $this->id_citie, PDO::PARAM_INT);
        $insertion->execute();
    }
}
