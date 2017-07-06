<?php
require_once'../01-model/class-signin.php';

$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars($_POST['password']);
$password_crypted = md5($password);

$connexion = new DataConnexion();
$user = $connexion->findUser($pseudo, $password_crypted);


// Si erreur dans la saisie ou utilisateur bannie (groupe 3)
if ((!$user) || ($user["id_groupe"] === '3'))
{
     header('Location:../index.php?page=home&connexion=error');
} else {
  session_start();
  $_SESSION['id'] = $user["id"];
  $_SESSION['pseudo'] = $user["pseudo"];
  $_SESSION['idGroup'] = $user["id_groupe"];
  header('Location:../index.php?page=home&connexion=ok');
}

?>