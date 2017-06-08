<?php
require_once'../01-model/class-signup.php';

/***********/
/***DATA****/
/***********/


//récupérer les données du post
$pseudo = htmlspecialchars($_POST['pseudo']);
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$mail = htmlspecialchars(filter_var(($_POST['email']), FILTER_SANITIZE_EMAIL));
$password = htmlspecialchars($_POST['password']);
//hachage du mot de passe

//regex dans des variables
$regexAlphaNum = "#^[a-zA-Z]{0,20}(([-\_ ][a-zA-Z]{0,20}){0,3})?[^0-9]$#";
$regexPassword = "#^([a-zA-Z0-9@*\#]{8,15})$#";

/**************/
/***FONCTION***/
/**************/

//Fonction de contrôle via regex
function ifMatch($regex, $input)
{
    if (preg_match($regex, $input))
    {
        return true;
    } else {
        return false;
    }
}

/***********/
/***VERIF***/
/***********/

if (!ifMatch($regexAlphaNum, $pseudo))
{
    header('Location:http://www.police-nationale.interieur.gouv.fr/');
} elseif (!ifMatch($regexAlphaNum, $firstName)){
    header('Location:http://www.police-nationale.interieur.gouv.fr/');
} elseif (!ifMatch($regexAlphaNum, $lastName)){
    header('Location:http://www.police-nationale.interieur.gouv.fr/');
} elseif (!ifMatch($regexPassword, $password)){
    header('Location:http://www.police-nationale.interieur.gouv.fr/');
} else {
    $password_crypted = md5($password);
    //Objet issu de class-inscription.php pour écrire dans la DB
    $inscrit = new InsertMember();
    $inscrit->insert($pseudo, $firstName, $lastName, $mail, $password_crypted);
    header('Location:https://ajax-training-jeromepisi.c9users.io/KungFu/index.php?page=home&inscription=ok');    
}

?>
