<?php
require_once'../01-model/class-members.php';

// recupéartion de l'id via le get
$id = $_GET['memberId'];

// Récupération des données du formulaire
$pseudo =  htmlspecialchars($_POST['pseudo']);
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);

// appel à notre class DataMember
$edition = new DataMember();

// si $_POST['edit'] => update
if (isset($_POST['edit']))
{
    $upDate = $edition->upDateMember($id, $pseudo, $firstName, $lastName, $email);
    header('Location:../index.php?page=index&memberUpDated#anchorSearch');
} elseif (isset($_POST['ban'])){
    $ban = $edition->banMember($id);
    header('Location:../index.php?page=index&memberBanned#anchorSearch');
} elseif (isset($_POST['delete'])) {
    $delete = $edition->deleteMember($id);
    header('Location:../index.php?page=index&memberDeleted#result');
}

?>