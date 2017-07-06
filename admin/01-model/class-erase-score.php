<?php
require_once'connexion-admin.php';

class SetEraseScore extends Request
{
    protected $tableName = 'scoreTable';
    
    public function DeleteAllScore()
    {
        $resultat = $this->db->query("DELETE FROM $this->tableName");
    }
    
    
    
}

?>