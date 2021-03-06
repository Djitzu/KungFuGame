<?php
require_once'connexion.php';

class DataConnexion extends Request
{
    protected $tableName = "users";
    
    public function findUser($pseudo, $password_crypted)
    {
        $resultat = $this->db->prepare("SELECT id, pseudo, id_groupe FROM $this->tableName WHERE pseudo = :pseudo AND password = :pass");
        $resultat->execute(array(
            'pseudo' => $pseudo,
            'pass' => $password_crypted));
        
        return $resultat->fetch(PDO::FETCH_ASSOC);
    }
}

?>