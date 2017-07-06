<?php
require_once'01-model/class-members.php';

$requestAllMember = new Datamember();
$nbMembers = $requestAllMember->countMember();

//Combien de lignes par page
$memberPerpage = 5;
$nbPage = ceil($nbMembers["nbMember"] / $memberPerpage);

// définition de la page courante
if (isset($_GET['numPage']) && ($_GET['numPage'] > 0) && ($_GET['numPage'] <= $nbPage))
{
    $currentPage = $_GET['numPage'];
} else {
    $currentPage = 1;
}

// Page précédante et suivante
$previousPage  = $currentPage - 1;
$nextPage  = $currentPage + 1;

$allMembers = $requestAllMember->findAllmember($currentPage, $memberPerpage);

?>