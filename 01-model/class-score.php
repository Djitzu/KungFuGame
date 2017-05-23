<?php
require_once'01-model/connexion.php';

class DataScore extends Request
{
    protected $tableName = 'scoreTable';
    
    //5 meilleurs scores de tous les temps
     public function findAll()
    {
        $resultat = $this->db->query("SELECT u.pseudo, sc.date, sc.score FROM $this->tableName sc INNER JOIN users u ON sc.id_user = u.id ORDER BY sc.score DESC LIMIT 5");
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //5 meilleurs scores de la semaines
    public function findAllLastWeek()
    {
        $resultat = $this->db->query("SELECT u.pseudo, sc.date, sc.score FROM $this->tableName sc INNER JOIN users u ON sc.id_user = u.id WHERE sc.date between adddate(now(),-7) and now() ORDER BY sc.score DESC LIMIT 5");
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Last 5 scores du joueur connecté
    public function findPlayerScore($id)
    {
        $resultat = $this->db->query("SELECT u.pseudo, sc.date, sc.score FROM scoreTable sc INNER JOIN users u ON sc.id_user = u.id WHERE u.id=" . $id);
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>