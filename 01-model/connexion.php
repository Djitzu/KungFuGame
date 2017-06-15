<?php

/*CREER UNE CLASSE POUR SE CONECTER À LA BIEN, EN OBJET*/
abstract class Request
{
    protected $db;
    protected $tableName;

    /*constructeur permet d'établir la connexion à la création de l'objet*/
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
}


?>