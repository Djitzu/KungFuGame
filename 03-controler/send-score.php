<?php
require_once'../01-model/class-score.php';
session_start();

//Récupération du score via formulaire
$score = htmlspecialchars($_POST['score']);

//Regex numeric only
$regexNum = '#^\d+$#';

//Si ça match, enregistrement sinon Batman
if (preg_match($regexNum, $score) && ($score <= 110000))
{
    $thisScore = new DataScore;
    $thisScore->insertUserScore($_SESSION['id'], $score);
    header('Location:../index.php?page=score');
    
} else {
    $_SESSION = [];
    session_destroy();
    header('Location:../index.php?page=cheater');
}

?>