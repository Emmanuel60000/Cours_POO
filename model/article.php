<?php


class Article
{
    // private $id;
    private $textes;
    private $id_utilisateurs;
    const HOST = "localhost";
    const DBNAME = "blogville";
    const LOGIN = "root";
    const PASSWORD = "";
    // public function getId()
    // {
    //     return $this->id;
    // }
    // public function setId($id)
    // {
    //     return $this->id = $id;
    // }
    public function getTextes()
    {
        return $this->textes;
    }
    public function setTextes($textes)
    {
        return $this->textes = $textes;
    }
    public function getId_utilisateurs()
    {
        return $this->id_utilisateurs;
    }
    public function setId_utilisateurs($id_utilisateurs)
    {
        return $this->id_utilisateurs = $id_utilisateurs;
    }
    private function connecter()
    {

        $pdo = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::LOGIN, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    // methode pour ecrire un article
    public function requete()
    {

        $inser = $this->connecter()->prepare("INSERT INTO articles (textes,id_utilisateurs)
        VALUES(?,?) ");

        $inser->bindValue(1, $this->textes, PDO::PARAM_STR);
        $inser->bindValue(2, $this->id_utilisateurs, PDO::PARAM_INT);
        $inser->execute();
    }
}
