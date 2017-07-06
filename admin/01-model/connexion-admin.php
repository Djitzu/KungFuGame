<?php

abstract class Request
{
    protected $db;
    protected $tableName;

    /*constructeur permet d'établir la connexion à la création de l'objet*/
    public function __construct()
    {
        try{
           $this->db = new PDO('mysql:host=trololo;dbname=trololo;charset=utf8', 'trololo', 'trololo');
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