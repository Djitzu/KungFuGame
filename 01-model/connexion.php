<?php

/*CREER UNE CLASSE POUR SE CONECTER À LA BIEN, EN OBJET*/
abstract class Request
{
    protected $db;
    protected $tableName;

    /*constructeur permet de créer la connexion*/
    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=ChiKungFuMi;charset=utf8', 'jeromepisi', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erreur) {
            die(
                '<img src="http://i.imgur.com/KhL18Ao.gif"/>
                <p>The connexion to the database is broken. Please inform the admin... Somehow... Or come back later.</p>'
                );
        }
    }
    
    /*abstract function findAll();*/
    /*récupérer 1 élément -> FETCH*/    /*
    public function findOne($id)
    {
        $resultat = $this->db->query("SELECT * FROM $this->tableName WHERE id = :id");
        $resultat->bindParam(':id', $id);
        return $resultat->fectch(PDO::FETCH_ASSOC);
    }
    */
    /*CF worksapce poo-trainning/CLASSPHP si besoin de plus*/
}


?>