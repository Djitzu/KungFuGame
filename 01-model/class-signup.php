<?php
require_once'connexion.php';

class InsertMember extends Request
{
    protected $tableName ='users';
    
    public function insert($pseudo, $firstName, $lastName, $mail, $password_crypted)
    {
        $inscription = $this->db->prepare("INSERT INTO $this->tableName (pseudo, firstName, lastName, mail, password, id_groupe) VALUES (:pseudo, :firstName, :lastName, :mail, :password, 2)");
        
        $inscription->execute(array(
                'pseudo' => $pseudo,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'mail' => $mail,
                'password' => $password_crypted));
    }
}

?>