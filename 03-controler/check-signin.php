<?php
require_once'../01-model/class-signin.php';

var_dump($_POST);

$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars($_POST['password']);
$password_crypted = md5($password);

$connexion = new DataConnexion();
$user = $connexion->findUser($pseudo, $password_crypted);

if (!$user)
{
     header('Location:https://ajax-training-jeromepisi.c9users.io/KungFu/index.php?page=home&connexion=error');
} else {
  echo $user["pseudo"];
  session_start();
  $_SESSION['id'] = $user["id"];
  $_SESSION['pseudo'] = $user["pseudo"];
  var_dump($_SESSION);
  header('Location:https://ajax-training-jeromepisi.c9users.io/KungFu/index.php?page=home&connexion=ok');
  echo 'vous êtes connecté !';
}

?>