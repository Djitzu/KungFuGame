<?php
require_once'../01-model/class-members.php';

$research = htmlspecialchars($_POST['searchMember']);

$adminQuery = new DataMember();
$query = $adminQuery->searchAMember($research);

if (($query != false) && ($_POST['searchMember'] !== ''))
{
    header('Location:../index.php?page=index&memberId='. $query['id'] . '#result');
} else {
    header('Location:../index.php?page=index&memberId=NotFound#result');
}

?>