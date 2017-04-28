<?php
require_once'class-score.php';

/*creer objet à partir de la classe étendue dans score.php*/
$requestScore = new DataScore();

$allScore = $requestScore->findAll();
$allWeekScore = $requestScore->findAllLastWeek();
if ($_SESSION['pseudo'])
{
    $allUserScore = $requestScore->findPlayerScore($_SESSION['id']);
}
?>
