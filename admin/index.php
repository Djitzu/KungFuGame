<?php
session_start();

//Verification : seul un admin peut entrer ici.
if ($_SESSION["idGroup"] !== '1')
{
     header('Location:https:../index.php?page=home');
}


//HEAD
include'02-view/partials/header.php';

$page= 'index';

if (isset($_GET['page']) && ($_GET['page'] === 'index') || ($_GET['page'] === 'allMember') || ($_GET['page'] === 'parameters'))
{
    $page = $_GET['page'];
} else {
    echo '<h1>erreur url</h1>';
}

//BODY
include'02-view/page/' .$page. '.phtml';


//FOOTER
include'02-view/partials/footer.php';
?>