<?php
require_once'connexion-admin.php';

class DataMember extends Request
{
    protected $tableName = 'users';
    
//RECHERCHE DES MEMBRES
    
    //Trouver tous les membres (allMember.phtml)
    public function findAllmember($currentPage, $memberPerpage)
    {
        $resultat = $this->db->query("SELECT id, pseudo, firstName, lastName, mail FROM $this->tableName ORDER BY pseudo ASC LIMIT " .(($currentPage - 1)*$memberPerpage). ", $memberPerpage");
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Combien de membre en tout (allMember.phtml - pagination)
    public function countMember()
    {
        $resultat = $this->db->query("SELECT COUNT( id ) AS nbMember FROM $this->tableName");
        return $resultat->fetch(PDO::FETCH_ASSOC);
    }
    
    //Trouver un membre (index.phtml)
    public function findOneMember($id)
    {
        $resultat = $this->db->query("SELECT $this->tableName.id, $this->tableName.pseudo, $this->tableName.firstName, $this->tableName.lastName, $this->tableName.mail FROM $this->tableName WHERE id = $id");
        return $resultat->fetch(PDO::FETCH_ASSOC);
    }
    
   
    //Trouver un membre index.phtml
    public function searchAMember($research)
    {
        $resultat = $this->db->query("SELECT 
                                            id,
                                            pseudo,
                                            firstName,
                                            lastName,
                                            mail
                                    FROM $this->tableName 
                                    WHERE pseudo LIKE '$research%'
                                    OR firstName LIKE '$research%'
                                    OR lastName LIKE '$research%'
                                    OR mail LIKE '$research%'");
        return $resultat->fetch(PDO::FETCH_ASSOC);
    }
    
//ACTION SUR LES MEMBRES
    
    //Editer un membre
    public function upDateMember($id, $pseudo, $firstName, $lastName, $email)
    {
        $upDate = $this->db->query("UPDATE $this->tableName
                                        SET 
                                            pseudo = '$pseudo',
                                            firstName = '$firstName',
                                            lastName = '$lastName',
                                            mail = '$email'
                                        WHERE id = '$id'");
    }
    
    //Bannir qulqu'un
    public function banMember($id)
    {
         $ban = $this->db->query("UPDATE $this->tableName
                                        SET 
                                            id_groupe = '3'
                                        WHERE id = '$id'");
    }
    
    //Effacer un compte
    public function deleteMember($id)
    {
        $delete = $this->db->query("DELETE FROM $this->tableName WHERE id = '$id'");
    }
    
//TROUVER ET EFFACER LES SCORES
    
     //Trouver le score d'un membre (index.phtml)
    public function findScoreMember($id)
    {
        $resultat = $this->db->query("SELECT u.id, st.id, st.date, st.score, st.id_user FROM users u INNER JOIN scoreTable st ON u.id = st.id_user WHERE u.id=$id");
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Effacer un score (index.phtml)
    public function eraseOneScore($id)
    {
        $resultat = $this->db->query("DELETE FROM scoreTable WHERE id = $id");
    }
    
    //Effacer tous les scores d'un membre (index.phtml)
    public function eraseAllMemberScore($id)
    {
        $resultat = $this->db->query("DELETE FROM scoreTable WHERE id_user = $id");
    }
}

?>